<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Modalidade Controller
 *
 * @property \App\Model\Table\ModalidadeTable $Modalidade
 */
class ModalidadeController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {        
        $this->set('modalidade', $this->paginate($this->Modalidade));
        $this->set('_serialize', ['modalidade']);
    }

    /**
     * View method
     *
     * @param string|null $id Modalidade id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modalidade = $this->Modalidade->get($id, [
            'contain' => ['Curso']
        ]);
        $this->set('modalidade', $modalidade);
        $this->set('_serialize', ['modalidade']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modalidade = $this->Modalidade->newEntity();
        if ($this->request->is('post')) {
            $modalidade = $this->Modalidade->patchEntity($modalidade, $this->request->data);
            if ($this->Modalidade->save($modalidade)) {
                $this->Flash->success(__('The modalidade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modalidade could not be saved. Please, try again.'));
            }
        }
        
        $this->set(compact('modalidade'));
        $this->set('_serialize', ['modalidade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modalidade id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modalidade = $this->Modalidade->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modalidade = $this->Modalidade->patchEntity($modalidade, $this->request->data);
            if ($this->Modalidade->save($modalidade)) {
                $this->Flash->success(__('The modalidade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modalidade could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('modalidade'));
        $this->set('_serialize', ['modalidade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modalidade id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modalidade = $this->Modalidade->get($id);
        if ($this->Modalidade->delete($modalidade)) {
            $this->Flash->success(__('The modalidade has been deleted.'));
        } else {
            $this->Flash->error(__('The modalidade could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
