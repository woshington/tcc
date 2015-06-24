<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
    private $professor = null;

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->professor = $this->Professor->findByUsuarioId($this->Auth->user('id'))->first();

    }

    public function index()
    {

    }

    /**
     * View method
     *
     * @param string|null $id Professor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view()
    {

        $professor = $this->Professor->get($this->professor->id, [
             'contain' => ['Usuario', 'Eixo']
        ]);
        
        $this->set('professor', $professor);
        $this->set('_serialize', ['professor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $professor = $this->Professor->get($this->professor->id, [
             'contain' => ['Usuario', 'Eixo']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professor->patchEntity($professor, $this->request->data);
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
