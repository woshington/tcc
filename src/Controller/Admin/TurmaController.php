<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Turma Controller
 *
 * @property \App\Model\Table\TurmaTable $Turma
 */
class TurmaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $anos = range(date('Y')-2, date('Y')+1);
        foreach ($anos as $key => $ano) {
            unset($anos[$key]);
            $anos[$ano] = $ano;
        }
        $this->set('anos', $anos);
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Curso', 'Sala'],
            'conditions'=>['ativo'=>true]
        ];
        $this->set('turma', $this->paginate($this->Turma));
        $this->set('_serialize', ['turma']);
    }

    /**
     * View method
     *
     * @param string|null $id Turma id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turma = $this->Turma->get($id, [
            'contain' => ['Curso', 'Sala']
        ]);
        $this->set('turma', $turma);
        $this->set('_serialize', ['turma']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turma = $this->Turma->newEntity();
        if ($this->request->is('post')) {
            $turma = $this->Turma->patchEntity($turma, $this->request->data);
            if ($this->Turma->save($turma)) {
                $this->Flash->success(__('The turma has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The turma could not be saved. Please, try again.'));
            }
        }
        $curso = $this->Turma->Curso->find('list', ['limit' => 200]);
        $sala = $this->Turma->Sala->find('list', ['limit' => 200]);
        $this->set(compact('turma', 'curso', 'sala'));
        $this->set('_serialize', ['turma']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Turma id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turma = $this->Turma->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turma = $this->Turma->patchEntity($turma, $this->request->data);
            if ($this->Turma->save($turma)) {
                $this->Flash->success(__('The turma has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The turma could not be saved. Please, try again.'));
            }
        }
        $curso = $this->Turma->Curso->find('list', ['limit' => 200]);
        $sala = $this->Turma->Sala->find('list', ['limit' => 200]);
        $this->set(compact('turma', 'curso', 'sala'));
        $this->set('_serialize', ['turma']);
    }

    public function verTurmas($curso_id = null){
        $this->paginate = [
            'contain' => ['Curso', 'Sala'],
            'conditions'=>['ativo'=>true, 'Curso.id'=>$curso_id]
        ];
        $this->set('turma', $this->paginate($this->Turma));
        $this->set('_serialize', ['turma']);

    }

    public function getTurmas($curso_id=null){
        $this->layout = 'ajax';
        $this->autoRender = FALSE;
        echo json_encode($this->Turma->findByCursoIdAndAtivo($curso_id, true)->toArray());
    }
}
