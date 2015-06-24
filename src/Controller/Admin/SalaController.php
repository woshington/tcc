<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Sala Controller
 *
 * @property \App\Model\Table\SalaTable $Sala
 */
class SalaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('sala', $this->paginate($this->Sala));
        $this->set('_serialize', ['sala']);
    }

    /**
     * View method
     *
     * @param string|null $id Sala id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sala = $this->Sala->get($id, [
            'contain' => ['Turma']
        ]);
        $this->set('sala', $sala);
        $this->set('_serialize', ['sala']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sala = $this->Sala->newEntity();
        if ($this->request->is('post')) {
            $sala = $this->Sala->patchEntity($sala, $this->request->data);
            if ($this->Sala->save($sala)) {
                $this->Flash->success(__('The sala has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sala could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sala'));
        $this->set('_serialize', ['sala']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sala id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sala = $this->Sala->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sala = $this->Sala->patchEntity($sala, $this->request->data);
            if ($this->Sala->save($sala)) {
                $this->Flash->success(__('The sala has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sala could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sala'));
        $this->set('_serialize', ['sala']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sala id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sala = $this->Sala->get($id);
        if ($this->Sala->delete($sala)) {
            $this->Flash->success(__('The sala has been deleted.'));
        } else {
            $this->Flash->error(__('The sala could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
