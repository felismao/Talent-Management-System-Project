<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Talents Controller
 *
 * @property \App\Model\Table\TalentsTable $Talents
 * @property \App\Model\Table\MediasTable $Medias
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TalentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    // this function sets up the display of all the talent data in a table form
    public function index()
    {
        // this sets the view to use the admin default template
        $this->viewBuilder()->setLayout('admin');

        // pagination ensures that a reasonable number of records per page are being displayed
        $talents = $this->paginate($this->Talents);

        $this->set(compact('talents'));

        $this->paginate = [
            'contain' => ['Locations'],
        ];

        // this gets the data from the talents table
        $talents = $this->getTableLocator()->get("Talents");

        // this fetches all talents from the database and orders the newly created talents last
        $results = $talents->find('all')->order(['Talents__id ASC'])->contain(['Locations'=>['fields'=>['id','name']]]); //'Categories'=>['fields'=>['id','name']],

        // only show 10 articles at a time
        //$categories = $this->Talents->Categories->find('list', ['limit' => 200,'valueField'=>'name'])->all();
        $locations = $this->Talents->Locations->find('list', ['limit' => 200,'valueField'=>'name'])->all();

        // this sets up the results and location variables to be used in the talent index template
        $this->set(compact('results', 'locations')); // 'categories'
    }

    /**
     * View method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // this function sets up a single talent to be displayed
    public function view($id = null)
    {
        // this sets the view to use the admin default template
        $this->viewBuilder()->setLayout('admin');

        // this fetches a specific talents information
        $talent = $this->Talents->get($id, [
            'contain' => ['Locations','Medias']
        ]);

        // this sets up the talent variable to be used in the talent view template
        $this->set(compact('talent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // adds a new talent to the database
    public function add()
    {
        // this sets the view to use the admin default template
        $this->viewBuilder()->setLayout('admin');

        $this->loadModel('Talents');
 //       $this->loadModel('Medias');

        $talent = $this->Talents->newEmptyEntity();
//        $media = $this->Medias->newEmptyEntity();
//        $media2 = $this->Medias->newEmptyEntity();

        // this prepares the data for saving if the form has been submitted
        if ($this->request->is('post')) {
            //debug($talent);
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());
            //debug($talent);
//            $talent->category = ($this->request->getData('category')[0]) ? $this->request->getData('category')[0] : null;
//            $talent->categorytwo = ($this->request->getData('category')[1]) ? $this->request->getData('category')[1] : null;
//            $talent->categorythree = ($this->request->getData('category')[2]) ? $this->request->getData('category')[2] : null;
            //debug($talent);
     //      exit;

            //$counter1 = 0;
            //$counter2 = 0;

            // if there are no errors in the form the data will be saved
            if (!$talent->getErrors) {
                // fetches the users feature photo input
                $image = $this->request->getData('add_photo');
                $name = $image->getClientFilename();

                // if the image does not already exist, make a new directory
                if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                    mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                // set up the directory for the image to be saved to
                $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;

                //$targetPath = WWW_ROOT.'img'.DS.$name;
                //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                // check if an image has been inputted
                if ($name) {
                    // move the image to the prepared directory
                    $image->moveTo($targetPath);
                }

                // save the feature photo to the featurephoto variable in the database
                $talent->featurephoto = 'user-img/' . $name;
                //$talent->featurephoto = $name;

                // fetches the users first media photo input
                $image = $this->request->getData('filename1');
                $name1 = $image->getClientFilename();

                // check if the first media photo has been inputted
                if ($name1 != "") {
                    // if the image does not already exist, make a new directory
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    // set up the directory for the image to be saved to
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name1;

                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                    // check if an image has been inputted
                    if ($name1) {
                        // move the image to the prepared directory
                        $image->moveTo($targetPath);
                    }

                    // save the first media to the mediaone variable in the database
                    $talent->mediaone = 'user-img/' . $name1;

                }
                // set the variable in the database to null if no media was entered by the user
                else{
                    $talent->mediaone = null;
                }

                    // fetches the users second media photo input
                    $image = $this->request->getData('filename2');
                    $name2 = $image->getClientFilename();

                    // check if the second media photo has been inputted
                    if ($name2 != "") {
                        // if the image does not already exist, make a new directory
                        if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                            mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                        // set up the directory for the image to be saved to
                        $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name2;

                        //$targetPath = WWW_ROOT.'img'.DS.$name;
                        //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                        // check if an image has been inputted
                        if ($name2) {
                            // move the image to the prepared directory
                            $image->moveTo($targetPath);
                        }

                        // save the second media to the mediatwo variable in the database
                        $talent->mediatwo = 'user-img/' . $name2;
                    }
                    // set the variable in the database to null if no media was entered by the user
                    else{
                        $talent->mediatwo = null;
                    }

                // fetches the users third media photo input
                $image = $this->request->getData('filename3');
                $name3 = $image->getClientFilename();

                // check if the third media photo has been inputted
                if ($name3 != "") {
                    // if the image does not already exist, make a new directory
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    // set up the directory for the image to be saved to
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name3;

                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                    // check if an image has been inputted
                    if ($name3) {
                        // move the image to the prepared directory
                        $image->moveTo($targetPath);
                    }

                    // save the third media to the mediathree variable in the database
                    $talent->mediathree = 'user-img/' . $name3;
                }
                // set the variable in the database to null if no media was entered by the user
                else{
                    $talent->mediathree = null;
                }
            }

            // present a feedback message to the customer telling them if the talent was saved correctly or not
            if ($this->Talents->save($talent)) { // $result =

                // THIS IS COMMENTED AS MEDIAS USED TO BE SAVED IN THE MEDIA TABLE
                // IT IS NOW PART OF THE TALENTS TABLE
                //$talent_id = $result->id;
                /*$media->talent_id = $talent_id;
                $media2->talent_id = $talent_id;


                $media = $this->Medias->patchEntity($media, $this->request->getData());
                $media2 = $this->Medias->patchEntity($media2, $this->request->getData()); // process the talent first and then do medias

                if (!$media->getErrors) {
                    $image = $this->request->getData('filename1');
                    $name = $image->getClientFilename();


                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;


                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                    if ($name) {
                        $image->moveTo($targetPath);
                    }
                    $media->filename = 'user-img/' . $name;

                    if ($media->filename != 'user-img/'){
                        $counter1 = 1;}
                }

                if (!$media2->getErrors) {
                    $image2 = $this->request->getData('filename2');
                    $name2 = $image2->getClientFilename();


                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name2;


                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                    if ($name2) {
                        $image2->moveTo($targetPath);
                    }
                    $media2->filename = 'user-img/' . $name2;
                    //$talent->featurephoto = $name;

                    if ($media2->filename != 'user-img/'){
                        $counter2 = 1;}
                }


                if ($counter1 == 1) { // $media->filename == "user-img/"
                    $this->Medias->save($media);
                }

                if ($counter2 == 1) { // $media2->filename == "user-img/"
                    $this->Medias->save($media2);
                }*/

                // feedback message if success
                $this->Flash->success(__('The talent has been saved.'));

                // redirect from the add page to the index page
                return $this->redirect(['action' => 'index']);
            }
            // feedback message if there are errors
            $this->Flash->error(__('The talent could not be saved. Please, try again.'));

        }

        // preparing data that will be processed in the add page
        $cat = [''=>'','Languages'=>'Languages', 'Accents'=>'Accents', 'Musician'=>'Musician', 'Singer'=>'Singer', 'Dancer'=>'Dancer', 'Performing Artist'=>'Performing Artist', 'Stunts'=>'Stunts'];
        //$categories = $this->Talents->Categories->find('list', ['limit' => 200])->all();
        $locations = $this->Talents->Locations->find('list', ['limit' => 200])->all();

        // display variables to be used in the add page
        $this->set(compact('talent', 'locations', 'cat'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // edit an already existing talent
    public function edit($id = null)
    {
        // this sets the view to use the admin default template
        $this->viewBuilder()->setLayout('admin');

        // get the current talent that is being edited
        $talent = $this->Talents->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());

            //$talent->category = ($this->request->getData('category')[0]) ? $this->request->getData('category')[0] : null;
            //$talent->categorytwo = ($this->request->getData('category')[1]) ? $this->request->getData('category')[1] : null;
            //$talent->categorythree = ($this->request->getData('category')[2]) ? $this->request->getData('category')[2] : null;

            // if there are no errors in the form the data will be saved
            if (!$talent->getErrors()) {
                // fetches the users feature photo input
                $image = $this->request->getData('change_image');
                $name = $image->getClientFilename();

                // save an image to the database
                if ($name) {
                    // if the image does not already exist, make a new directory
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    // set up the directory for the image to be saved to
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;

                    // move the image to the prepared directory
                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    $image->moveTo($targetPath);


                    // delete the current image if it has been replaced
                    $imgpath = WWW_ROOT . 'img' . DS . $talent->featurephoto;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }

                    // save the feature photo to the featurephoto variable in the database
                    $talent->featurephoto = 'user-img/' . $name;
                    //$talent->featurephoto = $name;
                }

                // fetches the users media one photo input
                $media1 = $this->request->getData('change_filename1');
                $name1 = $media1->getClientFilename();

                // check if the media1 image has been inputted
                if ($name1) {
                    // if the image does not already exist, make a new directory
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    // set up the directory for the image to be saved to
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name1;

                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    // move the image to the prepared directory
                    $media1->moveTo($targetPath);

                    // check if the first media photo has been inputted
                    if ($talent->mediaone != null) {
                        // delete the current image if the media has been replaced
                        $imgpath = WWW_ROOT . 'img' . DS . $talent->mediaone;
                        if (file_exists($imgpath)) {
                            unlink($imgpath);
                        }
                    }

                    // save the first media to the mediaone variable in the database
                    $talent->mediaone = 'user-img/' . $name1;
                    //$talent->featurephoto = $name;
                }


                // fetches the users media two photo input
                $media2 = $this->request->getData('change_filename2');
                $name2 = $media2->getClientFilename();

                // save an image to the database
                if ($name2) {
                    // if the image does not already exist, make a new directory
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    // set up the directory for the image to be saved to
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name2;

                    // move the image to the prepared directory
                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    $media2->moveTo($targetPath);

                    // delete the current image if it has been replaced
                    if ($talent->mediatwo != null) {
                        $imgpath = WWW_ROOT . 'img' . DS . $talent->mediatwo;
                        if (file_exists($imgpath)) {
                            unlink($imgpath);
                        }
                    }

                    // save the second media to the media two variable in the database
                    $talent->mediatwo = 'user-img/' . $name2;

                    //$talent->featurephoto = $name;
                }

                // fetches the users third media photo input
                $media3 = $this->request->getData('change_filename3');
                $name3 = $media3->getClientFilename();

                // save an image to the database
                if ($name3) {
                    // if the image does not already exist, make a new directory
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    // set up the directory for the image to be saved to
                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name3;

                    // move the image to the prepared directory
                    $media3->moveTo($targetPath);

                    // check if the third media photo has been inputted
                    if ($talent->mediathree != null) {
                        // delete the current image if it has been replaced
                        $imgpath = WWW_ROOT . 'img' . DS . $talent->mediathree;
                        if (file_exists($imgpath)) {
                            unlink($imgpath);
                        }
                    }

                    // save the third media to the mediathree variable in the database
                    $talent->mediathree = 'user-img/' . $name3;
                    //$talent->featurephoto = $name;
                }
            }

            // try to save the talent data
            if ($this->Talents->save($talent)) { // and $this->Medias->save($media) and $this->Medias->save($media2)

                /*$media = $this->Talents->Medias->find('all')->select(['id'])->where(['talent_id'=>$id]);

                foreach ($media as $ids):
                    $media1 = $this->Medias->patchEntity($ids, $this->request->getData());

                    if (!$media1->getErrors()) {
                        $image = $this->request->getData('change_filename');
                        $name = $image->getClientFilename();

                        // save an image to the database
                        if ($name) {
                            if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                                mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                            $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;

                            //$targetPath = WWW_ROOT.'img'.DS.$name;
                            $image->moveTo($targetPath);

                            // delete the current image if it has been replaced
                            $imgpath = WWW_ROOT . 'img' . DS . $media1->filename;
                            if (file_exists($imgpath)) {
                                unlink($imgpath);
                            }

                            $media1->filename = 'user-img/' . $name;

                            $media1->talent_id = $id;
                            $this->Medias->save($media1);

                        }
                    }
                endforeach;*/

                    // success feedback
                    $this->Flash->success(__('The talent has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                // error feedback
                $this->Flash->error(__('The talent could not be saved. Please, try again.'));
            }

        // prepare the variables to be used in the edit talent backend template
        //$categories = $this->Talents->Categories->find('list', ['limit' => 200])->all();
        $locations = $this->Talents->Locations->find('list', ['limit' => 200])->all();
        $this->set(compact('talent', 'locations')); // , 'media'
    }

    /**
     * Delete method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // delete the talent selected for deletion
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        // get the current talent that is being deleted
        $talent = $this->Talents->get($id);

        // present a feedback message to the customer detailing whether the talent was correctly deleted or not
        if ($this->Talents->delete($talent)) {
            $this->Flash->success(__('The talent has been deleted.'));
        } else {
            $this->Flash->error(__('The talent could not be deleted. Please, try again.'));
        }

        // redirect to the index (talent admin homepage)
        return $this->redirect(['action' => 'index']);
    }
}
