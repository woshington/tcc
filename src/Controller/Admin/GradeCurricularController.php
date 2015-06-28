<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * GradeCurricular Controller
 *
 * @property \App\Model\Table\GradeCurricularTable $GradeCurricular
 */
class GradeCurricularController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Disciplina', 'Professor', 'Turma']
        ];
        $this->set('gradeCurricular', $this->paginate($this->GradeCurricular));
        $this->set('_serialize', ['gradeCurricular']);
    }

    /**
     * View method
     *
     * @param string|null $id Grade Curricular id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gradeCurricular = $this->GradeCurricular->get($id, [
            'contain' => ['Disciplina', 'Professor', 'Turma']
        ]);
        $this->set('gradeCurricular', $gradeCurricular);
        $this->set('_serialize', ['gradeCurricular']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gradeCurricular = $this->GradeCurricular->newEntity();
        if ($this->request->is('post')) {
            $gradeCurricular = $this->GradeCurricular->patchEntity($gradeCurricular, $this->request->data);
            if ($this->GradeCurricular->save($gradeCurricular)) {
                $this->Flash->success(__('The grade curricular has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grade curricular could not be saved. Please, try again.'));
            }
        }
        $disciplina = $this->GradeCurricular->Disciplina->find('list', ['limit' => 200]);
        $professor = $this->GradeCurricular->Professor->find('all');
        
        $professores = [];
        foreach ($professor as $professor) {
            $professores[$professor->id] = $professor->usuario->nome;
        }
        
        $turma = $this->GradeCurricular->Turma->find('list', ['limit' => 200]);
        
        $this->set(compact('gradeCurricular', 'disciplina', 'professores', 'turma'));
        $this->set('_serialize', ['gradeCurricular']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grade Curricular id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gradeCurricular = $this->GradeCurricular->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gradeCurricular = $this->GradeCurricular->patchEntity($gradeCurricular, $this->request->data);
            if ($this->GradeCurricular->save($gradeCurricular)) {
                $this->Flash->success(__('The grade curricular has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grade curricular could not be saved. Please, try again.'));
            }
        }
        $disciplina = $this->GradeCurricular->Disciplina->find('list', ['limit' => 200]);
        $professor = $this->GradeCurricular->Professor->find('list', ['limit' => 200]);
        $curso = $this->GradeCurricular->Curso->find('list', ['limit' => 200]);
        $this->set(compact('gradeCurricular', 'disciplina', 'professor', 'curso'));
        $this->set('_serialize', ['gradeCurricular']);
    }

    public function verGrade($turma_id = null){
        $this->paginate = [
            'contain' => ['Disciplina', 'Professor', 'Turma'],
            'conditions'=>['Turma.id'=>$turma_id]
        ];
        $this->set('gradeCurricular', $this->paginate($this->GradeCurricular));
        $this->set('_serialize', ['gradeCurricular']);
    }
}
