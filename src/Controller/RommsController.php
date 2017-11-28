<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Romms Controller
 *
 *
 * @method \App\Model\Entity\Romm[] paginate($object = null, array $settings = [])
 */
class RommsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $romms = $this->paginate($this->Romms);

        $this->set(compact('romms'));
        $this->set('_serialize', ['romms']);
    }

    /**
     * View method
     *
     * @param string|null $id Romm id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $romm = $this->Romms->get($id, [
            'contain' => []
        ]);

        $this->set('romm', $romm);
        $this->set('_serialize', ['romm']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $romm = $this->Romms->newEntity();
        if ($this->request->is('post')) {
            $romm = $this->Romms->patchEntity($romm, $this->request->getData());
            if ($this->Romms->save($romm)) {
                $this->Flash->success(__('The romm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The romm could not be saved. Please, try again.'));
        }
        $this->set(compact('romm'));
        $this->set('_serialize', ['romm']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Romm id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $romm = $this->Romms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $romm = $this->Romms->patchEntity($romm, $this->request->getData());
            if ($this->Romms->save($romm)) {
                $this->Flash->success(__('The romm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The romm could not be saved. Please, try again.'));
        }
        $this->set(compact('romm'));
        $this->set('_serialize', ['romm']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Romm id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $romm = $this->Romms->get($id);
        if ($this->Romms->delete($romm)) {
            $this->Flash->success(__('The romm has been deleted.'));
        } else {
            $this->Flash->error(__('The romm could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
