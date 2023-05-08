<?php
namespace App\Controller;

use function PHPUnit\Framework\isNull;
/**
 * Talents Controller
 *
 * @property \App\Model\Table\TalentsTable $Talents
 *
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue

        //Allow the customer view (index) to be access without logging in
        $this->Authentication->addUnauthenticatedActions(['index']);

    }

    // displays all available items in the session cart
    public function index()
    {
        // use customerview template
        $this->viewBuilder()->setLayout('customerview');

        $this->paginate = [
            'contain' => ['Locations'],
        ];

        //get the talentid that is in the session
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
                $checkOutItem['location']=$talent->location_id;
                $checkOutItem['featurephoto']=$talent->featurephoto;
                $checkOutItem['category']=$talent->category;
                $checkOutItem['categorytwo']=$talent->categorytwo;
                $checkOutItem['categorythree']=$talent->categorythree;

                //add to array
                array_push($checkOutList, $checkOutItem);
            endforeach;
        }
        else{
            $checkOutList = 0;
        }$this->set('checkOutList', $checkOutList);

    }


    //get talent from the session
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

?>
