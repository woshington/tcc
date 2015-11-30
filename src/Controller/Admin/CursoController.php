<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Curso Controller
 *
 * @property \App\Model\Table\CursoTable $Curso
 */
class CursoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modalidade']
        ];
        $this->set('curso', $this->paginate($this->Curso));
        $this->set('_serialize', ['curso']);
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Curso->get($id, [
            'contain' => ['Modalidade', 'Turma']
        ]);
        $this->set('curso', $curso);
        $this->set('_serialize', ['curso']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Curso->newEntity();
        if ($this->request->is('post')) {
            $curso = $this->Curso->patchEntity($curso, $this->request->data);
            
            if ($this->Curso->save($curso)) {
                $this->Flash->success(__('The curso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The curso could not be saved. Please, try again.'));
            }
        }
        $modalidade = $this->Curso->Modalidade->find('list', ['limit' => 200]);
        $eixo = $this->Curso->Eixo->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'modalidade', 'eixo'));
        $this->set('_serialize', ['curso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Curso->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Curso->patchEntity($curso, $this->request->data);
            if ($this->Curso->save($curso)) {
                $this->Flash->success(__('The curso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The curso could not be saved. Please, try again.'));
            }
        }
        $modalidade = $this->Curso->Modalidade->find('list', ['limit' => 200]);
        $eixo = $this->Curso->Eixo->find('list', ['limit' => 200]);
        $this->set(compact('curso', 'modalidade', 'eixo'));
        $this->set('_serialize', ['curso']);
    }
}
