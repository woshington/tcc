<?php
namespace App\Controller\Coordenador;

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
        
        $this->paginate = [
            'contain' => ['Usuario', 'Eixo'],
            'conditions'=>[
                'NOT'=>[
                    'Professor.id'=>$this->professor->id
                ],
                'Eixo.id'=>$this->professor->eixo_id
            ]
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
        $id = is_null($id) ? $this->professor->id : $id;
        $professor = $this->Professor->get($id, [
            'contain' => ['Usuario', 'Eixo'],
            'conditions'=>[
                'Eixo.id'=>$this->professor->eixo_id
            ]
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
            $professor->usuario->senha = $professor->usuario->matricula;
            $professor->usuario->ativo = true;
            $professor->coordenador = false;
            $professor->eixo_id = $this->professor->eixo_id;
            
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

    /**
     * Delete method
     *
     * @param string|null $id Professor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professor = $this->Professor->get($id);
        if ($this->Professor->delete($professor)) {
            $this->Flash->success(__('The professor has been deleted.'));
        } else {
            $this->Flash->error(__('The professor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
