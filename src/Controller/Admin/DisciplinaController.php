<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Disciplina Controller
 *
 * @property \App\Model\Table\DisciplinaTable $Disciplina
 */
class DisciplinaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('disciplina', $this->paginate($this->Disciplina));
        $this->set('_serialize', ['disciplina']);
    }

    /**
     * View method
     *
     * @param string|null $id Disciplina id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disciplina = $this->Disciplina->get($id, [
            'contain' => ['GradeCurricular']
        ]);
        $this->set('disciplina', $disciplina);
        $this->set('_serialize', ['disciplina']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disciplina = $this->Disciplina->newEntity();
        if ($this->request->is('post')) {
            $disciplina = $this->Disciplina->patchEntity($disciplina, $this->request->data);
            if ($this->Disciplina->save($disciplina)) {
                $this->Flash->success(__('The disciplina has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disciplina could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('disciplina'));
        $this->set('_serialize', ['disciplina']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Disciplina id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disciplina = $this->Disciplina->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disciplina = $this->Disciplina->patchEntity($disciplina, $this->request->data);
            if ($this->Disciplina->save($disciplina)) {
                $this->Flash->success(__('The disciplina has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disciplina could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('disciplina'));
        $this->set('_serialize', ['disciplina']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Disciplina id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disciplina = $this->Disciplina->get($id);
        if ($this->Disciplina->delete($disciplina)) {
            $this->Flash->success(__('The disciplina has been deleted.'));
        } else {
            $this->Flash->error(__('The disciplina could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
