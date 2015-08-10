<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Professor Controller
 *
 * @property \App\Model\Table\ProfessorTable $Professor
 */
class ProfessorController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuario', 'Eixo']
        ];
        $this->set('professor', $this->paginate($this->Professor));
        $this->set('_serialize', ['professor']);
    }

    /**
     * View method
     *
     * @param string|null $id Professor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $professor = $this->Professor->get($id, [
            'contain' => ['Usuario', 'Eixo']
        ]);
        $this->set('professor', $professor);
        $this->set('_serialize', ['professor']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professor = $this->Professor->newEntity();
        if ($this->request->is('post')) {
            $professor = $this->Professor->patchEntity($professor, $this->request->data, [
                'associated'=>'Usuario'
            ]);            
            if ($this->Professor->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professor could not be saved. Please, try again.'));
            }            
        }
        $usuario = $this->Professor->Usuario->find('list', ['limit' => 200]);
        $eixo = $this->Professor->Eixo->find('list', ['limit' => 200]);
        $this->set(compact('professor', 'usuario', 'eixo'));
        $this->set('_serialize', ['professor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professor = $this->Professor->get($id, [
            'contain' => ['Usuario']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professor->patchEntity($professor, $this->request->data, [
                'associated'=>'Usuario'
            ]);
            if ($this->Professor->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professor could not be saved. Please, try again.'));
            }
        }
        $usuario = $this->Professor->Usuario->find('list', ['limit' => 200]);
        $eixo = $this->Professor->Eixo->find('list', ['limit' => 200]);
        $this->set(compact('professor', 'usuario', 'eixo'));
        $this->set('_serialize', ['professor']);
    }
}
