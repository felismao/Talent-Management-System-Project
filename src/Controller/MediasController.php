<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Medias Controller
 *
 * @property \App\Model\Table\MediasTable $Medias
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

// THIS CONTROLLER IS CURRENTLY NOT BEING USED //
class MediasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('admin');
        $this->paginate = [
            'contain' => ['Talents'],
        ];
        $medias = $this->paginate($this->Medias);

        $this->set(compact('medias'));
    }

    /**
     * View method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $media = $this->Medias->get($id, [
            'contain' => ['Talents'],
        ]);

        $this->set(compact('media'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('admin');
        $media = $this->Medias->newEmptyEntity();
        if ($this->request->is('post')) {
            $media = $this->Medias->patchEntity($media, $this->request->getData());

                if(!$media->getErrors){
                    $image = $this->request->getData('filename');
                    $name = $image->getClientFilename();
                    $media->name = $name;

                    if (!is_dir(WWW_ROOT.'img'.DS.'user-img'))
                        mkdir(WWW_ROOT.'img'.DS.'user-img',0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;


                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    //$image->moveTo(WWW_ROOT . 'img' . DS . $name);

                    if ($name) {
                        $image->moveTo($targetPath);
                    }
                    $media->filename = 'user-img/' . $name;
                    //$talent->featurephoto = $name;
                }
            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $talents = $this->Medias->Talents->find('list', ['limit' => 200])->all();
        $this->set(compact('media', 'talents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin');
        $media = $this->Medias->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $media= $this->Medias->patchEntity($media, $this->request->getData());
            if (!$media->getErrors()) {
                $image = $this->request->getData('change_image');
                $name = $image->getClientFilename();

                // save an image to the database
                if ($name) {
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;

                    //$targetPath = WWW_ROOT.'img'.DS.$name;
                    $image->moveTo($targetPath);

                    // delete the current image if it has been replaced
                    $imgpath = WWW_ROOT . 'img' . DS . $media->filename;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }

                    $media->filename = 'user-img/' . $name;
                }
            }
            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The talent has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));

        }
        $talents = $this->Medias->Talents->find('list', ['limit' => 200])->all();
        $this->set(compact('media', 'talents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $media = $this->Medias->get($id);
        if ($this->Medias->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
