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
            'contain' => ['Curso', 'Sala']
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

    /**
     * Delete method
     *
     * @param string|null $id Turma id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turma = $this->Turma->get($id);
        if ($this->Turma->delete($turma)) {
            $this->Flash->success(__('The turma has been deleted.'));
        } else {
            $this->Flash->error(__('The turma could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
