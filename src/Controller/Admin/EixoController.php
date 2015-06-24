<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Eixo Controller
 *
 * @property \App\Model\Table\EixoTable $Eixo
 */
class EixoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('eixo', $this->paginate($this->Eixo));
        $this->set('_serialize', ['eixo']);
    }

    /**
     * View method
     *
     * @param string|null $id Eixo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eixo = $this->Eixo->get($id, [
            'contain' => ['Professor']
        ]);
        $this->set('eixo', $eixo);
        $this->set('_serialize', ['eixo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eixo = $this->Eixo->newEntity();
        if ($this->request->is('post')) {
            $eixo = $this->Eixo->patchEntity($eixo, $this->request->data);
            if ($this->Eixo->save($eixo)) {
                $this->Flash->success(__('The eixo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The eixo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eixo'));
        $this->set('_serialize', ['eixo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Eixo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eixo = $this->Eixo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eixo = $this->Eixo->patchEntity($eixo, $this->request->data);
            if ($this->Eixo->save($eixo)) {
                $this->Flash->success(__('The eixo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The eixo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eixo'));
        $this->set('_serialize', ['eixo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Eixo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eixo = $this->Eixo->get($id);
        if ($this->Eixo->delete($eixo)) {
            $this->Flash->success(__('The eixo has been deleted.'));
        } else {
            $this->Flash->error(__('The eixo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
