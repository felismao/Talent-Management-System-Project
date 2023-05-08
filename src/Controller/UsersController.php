<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Utility\Security;
use Cake\Mailer\Mailer;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login','forgotpassword','resetpassword']);

    }
    public function forgotpassword(){
        $this->ViewBuilder()->setLayout('ajax');
        if($this->request->is('post')){
            $myemail = $this->request->getData('email');
            $mytoken = Security::hash(Security::randomBytes(25)); //create token in a form of hash

            $usertable = $this->getTableLocator()->get("Users");
            $user = $usertable->find('all')->where(['email'=>$myemail])->first(); //find the user that has the inputted email
            $user->password='';
            $user->token = $mytoken;
            if($usertable->save($user)){
                if ($usertable->save($user)) {
                    $this->Flash->success(__('Reset password link has been sent to your email (' . $myemail . ')'));
                    $mailer = new Mailer('default');
                    //Setup Email parameters
                    $mailer
                        ->setEmailFormat('html')
                        ->setTo($myemail)
                        ->setSubject('Reset Password')
                        ->viewBuilder()
                        ->disableAutoLayout()
                        ->setTemplate('forgotpassword');
                    //send data to email template
                    $mailer->setViewVars([
                        'email'=>$myemail,
                        'token'=>$mytoken,
                    ]);

                    //Send email
                    $mailer->deliver();
                }

            }
        }
    }

    public function resetpassword($token){
        $this->ViewBuilder()->setLayout('ajax');
        if($this->request->is('post')){
            $mypass = $this->request->getData('password');

            $usertable = $this->getTableLocator()->get("Users");
            $user = $usertable->find('all')->where(['token'=>$token])->first(); //find the user that matches the token
            $user->password = $mypass;
            if($usertable->save($user)){
                return $this->redirect(['action'=>'login']);


            }
        }
    }



    public function login()
    {
        $this->ViewBuilder()->setLayout('ajax');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /talents after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Talents',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            // redirect to the home page when logout is successful
            return $this->redirect(['controller' => 'CustomerView', 'action' => 'index']);
        }
    }


    public function index()
    {
        $this->ViewBuilder()->setLayout('admin');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->ViewBuilder()->setLayout('admin');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->ViewBuilder()->setLayout('admin');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
