<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;
use function PHPUnit\Framework\isNull;

/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue

        //Allow the customer view (index', 'view','contact','Talents') to be access without logging in
        $this->Authentication->addUnauthenticatedActions(['add']);

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('admin');
        $emails = $this->paginate($this->Emails);

        $this->set(compact('emails'));
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $email = $this->Emails->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('email'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('customer');
        $email = $this->Emails->newEmptyEntity();
        $talentIds = $this->getTalentKeysFromSession();
        $checkOutList = array();

        if(isset($talentIds)){
            $cartSession = $this->request->getSession()->read('cart');

//            debug($talentIds);
            $talents = $this->getTableLocator()->get("Talents")->find()->where(['id IN' => $talentIds]);
//            debug($talents);

            foreach($talents as $talent):
                $checkOutItem = array();
                $checkOutItem['id'] = $talent->id;
                $checkOutItem['name'] = $talent->name;
                $checkOutItem['firstname'] = $talent->firstname;
                $checkOutItem['lastname'] = $talent->lastname;
                $checkOutItem['location']=$talent->location;
                $checkOutItem['featurephoto']=$talent->featurephoto;
                //add to array
                array_push($checkOutList, $checkOutItem);
            endforeach;
        }
        else{
            $checkOutList = 0;
        }
        $this->set('checkOutList', $checkOutList);
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());

            if ($this->Emails->save($email)) {
                //Send email
                $mailer = new Mailer('default');
                //Setup Email parameters
                $mailer
                    ->setEmailFormat('html')
                    ->setTo(Configure::read('EnquiryMail.to'))
//                    ->setFrom(Configure::read('EnquiryMail.from'))
                    ->setSubject('New enquiry from '.h($email->name). "<".h($email->email) . ">")
                    ->viewBuilder()
                    ->disableAutoLayout()
                    ->setTemplate('email');
                //send data to email template
                $mailer->setViewVars([
                    'content'=>$email->enquiry,
                    'name'=>$email->name,
                    'email'=>$email->email,
                    'created'=>$email->created,
                    'purpose'=>$email->purpose,
                    'contact'=>$email->contact,
                    'company_name'=>$email->company_name,
                    'id'=>$email->id,
                    'interested_talent'=>$email->interested_talent,
                ]);
                //Send email
                $email_result =  $mailer->deliver();

                if($email_result){
                    $email->sent = ($email_result)? true: false;
                    $this->Emails->save($email);
                    $this->Flash->success(__('The email has been sent.'));
                }else{
                    $this->Flash->error(__('Email Failed to send.'));
                }

                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['controller'=>'CustomerView','action' => 'index']);
            }
            $this->Flash->error(__('The email could not be saved. Please, try again.'));
        }
        $this->set(compact('email','checkOutList'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email could not be saved. Please, try again.'));
        }
        $this->set(compact('email'));
    }
    /**
     * Mark as Sent method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function mark($id = null)
    {
        $email = $this->Emails->get($id);
        if($email->sent){
            $this->Flash->error(__('This Enquiry is already marked as sent'));
        }else{
            $email->sent = true;
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been marked as sent'));
            } else {
                $this->Flash->error(__('Could not be marked as sent'));
            }
        }


        return $this->redirect(['action' => 'index']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The email has been deleted.'));
        } else {
            $this->Flash->error(__('The email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    // Get the talents in the session
    protected function getTalentKeysFromSession(){
        // getting cart session
        $cartSession = $this->request->getSession();
        if($cartSession->check('cart')){
            $talentIds = array_keys($cartSession->read('cart'));
        }else{
            $talentIds = null;
        }

        return $talentIds;
    }
}
