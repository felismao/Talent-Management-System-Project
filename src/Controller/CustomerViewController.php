<?php
declare(strict_types=1);

namespace App\Controller;
use SebastianBergmann\Type\NullType;
/**
 * Talents Controller
 *
 * @property \App\Model\Table\TalentsTable $Talents
 *
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomerViewController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->ViewBuilder()->setLayout('customer');

        //Allow the customer view (index', 'view','contact',etc) to be access without logging in.
        $this->Authentication->addUnauthenticatedActions(['index', 'view','contact','listtalent','showservice','etiquette','privacypolicy','aboutus','faq','termsofuse']);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('customer');
        $this->paginate = [
            'contain' => ['Locations'],
        ];
        $customerpage =$this->getTableLocator()->get("Talents");


        $query = $customerpage-> find('all',['limit'=>10]); // only show the first 10 in the main page

        $talents = $this->paginate($query);

        $this->set('talents',$talents);

    }

    /**
     * Privacy Policy method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function privacypolicy()
    {
        $this->viewBuilder()->setLayout('customer');
    }


    /**
     * Terms of Use method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function termsofuse()
    {
        $this->viewBuilder()->setLayout('customer');
    }


    /**
     * Etiquette method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function etiquette()
    {
        $this->viewBuilder()->setLayout('customer');
    }


    /**
     * View method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $talents = $this->getTableLocator()->get("Talents");
        $talent = $talents->get($id, [
            'contain' => ['Locations','Medias']
        ]);
        $this->viewBuilder()->setLayout('customerview');

        $shortlisted = 0;
        //Check if there is a shortlisted talents
        if($this->checkCartSessionExists()){
            $shortlisted = $this->request->getSession()->read('cart');

            // if it exist find the id
            if(array_key_exists($id, $shortlisted)){
                $shortlisted = $this->request->getSession()->read('cart')[$id];
            }
            else{
                $shortlisted = 0;
            }

            //debug($quantity);
        }
        if($this->request->is('post')){
            //debug($this->request->getData());
            //debug($talent['id']);

            // saving selected talent in a session
            $talentId = $talent['id'];
            $this->saveToCartSession($talentId);

        }

        $this->set(compact('talent'));
    }

// Check if session exist
    protected function checkCartSessionExists(){
        $cartSession = $this->request->getSession();
        return $cartSession->check('cart');
    }

    protected function saveToCartSession($talentId){
        // getting cart session
        $cartSession = $this->request->getSession();
        // check if session is empty. If empty, then put the array in
        if($cartSession->check('cart')==false){
            $cartArray = array();
            $cartArray[strval($talentId)] = $talentId;
            $cartSession->write(['cart'=>$cartArray]);
        }
        else{
            $cartArray = $cartSession->read('cart');
            //adding new talent
            $cartArray[strval($talentId)] = $talentId;

            //write new merged array to session
            $cartSession->write(['cart'=>$cartArray]);
        }

    }

    // displays a list of talents based on the users filtering
    public function listtalent()
    {
        // this sets the view to use the admin default template
        $this->viewBuilder()->setLayout('customer');

        $customerpage = $this->getTableLocator()->get("Talents");

        // this gets the advanced filter input from the customer
        $categoryfilter = $this->request->getQuery('key');
        $locationfilter = $this->request->getQuery('locationkey');
        $genderfilter = $this->request->getQuery('genderkey');
        $key = $this->request->getQuery('key');
        $namekey = $this->request->getQuery('namekey');
        $agekey = $this->request->getQuery('agekey');

        $this->paginate = [
            'contain' => ['Locations'],
        ];

        // Advanced Filter
        // filter talents if the user has inputted any data to be filtered
        if ($categoryfilter or $locationfilter or $genderfilter or $key or $agekey or $namekey){
            // returns talents that match all users filter request
           $query =$this->getTableLocator()->get("talents")->find('all')->where([
               'Locations.name LIKE'=>"%{$locationfilter}%",
               'gender LIKE'=>"{$genderfilter}%",
               'talents.name like'=>'%'.$namekey.'%',
               'talents.agerangeone like'=>$agekey,
               'OR' => ['talents.category LIKE '=>"%{$categoryfilter}%", 'talents.categorytwo LIKE '=>"%{$categoryfilter}%", 'talents.categorythree LIKE '=>"%{$categoryfilter}%"]]);
        }
        else{
            // if there is no user filter, fetch all talent data
            $query= $this->getTableLocator()->get("Talents");
        }

        $talents = $this->paginate($query);

        $this->set('talents', $talents);

    }

    public function showservice(){
        $this->viewBuilder()->setLayout('customerview');
        $service = $this->getTableLocator()->get("Services");
        $services = $this->paginate($service);

        $this->set(compact('services'));
    }

    public function aboutus(){
        $this->viewBuilder()->setLayout('customerview');
        $about = $this->getTableLocator()->get("Abouts");
        $abouts = $this->paginate($about);

        $this->set(compact('abouts'));
    }

    public function faq(){
        $this->viewBuilder()->setLayout('customerview');
        $faq = $this->getTableLocator()->get("Faqs");
        $faqs = $this->paginate($faq);

        $this->set(compact('faqs'));
    }
}
