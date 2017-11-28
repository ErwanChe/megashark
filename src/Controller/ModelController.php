<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Model Controller
 *
 *
 * @method \App\Model\Entity\Model[] paginate($object = null, array $settings = [])
 */
class ModelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $model = $this->paginate($this->Model);

        $this->set(compact('model'));
        $this->set('_serialize', ['model']);
    }

    /**
     * View method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $model = $this->Model->get($id, [
            'contain' => []
        ]);

        $this->set('model', $model);
        $this->set('_serialize', ['model']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $model = $this->Model->newEntity();
        if ($this->request->is('post')) {
            $model = $this->Model->patchEntity($model, $this->request->getData());
            if ($this->Model->save($model)) {
                $this->Flash->success(__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model could not be saved. Please, try again.'));
        }
        $this->set(compact('model'));
        $this->set('_serialize', ['model']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $model = $this->Model->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Model->patchEntity($model, $this->request->getData());
            if ($this->Model->save($model)) {
                $this->Flash->success(__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model could not be saved. Please, try again.'));
        }
        $this->set(compact('model'));
        $this->set('_serialize', ['model']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $model = $this->Model->get($id);
        if ($this->Model->delete($model)) {
            $this->Flash->success(__('The model has been deleted.'));
        } else {
            $this->Flash->error(__('The model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
