<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Administrador Controller
 *
 * @property \App\Model\Table\AdministradorTable $Administrador
 */
class AdministradorController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow('add');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuario']
        ];
        $this->set('administrador', $this->paginate($this->Administrador));
        $this->set('_serialize', ['administrador']);
    }

    /**
     * View method
     *
     * @param string|null $id Administrador id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrador = $this->Administrador->get($id, [
            'contain' => ['Usuario']
        ]);
        $this->set('administrador', $administrador);
        $this->set('_serialize', ['administrador']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrador = $this->Administrador->newEntity();
        if ($this->request->is('post')) {
            $administrador = $this->Administrador->patchEntity($administrador, $this->request->data, [
                'associated'=>'Usuario'                
            ]);
            $administrador->usuario->senha = $administrador->usuario->matricula;
            $administrador->usuario->ativo = true;
            if ($this->Administrador->save($administrador)) {
                $this->Flash->success(__('The administrador has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The administrador could not be saved. Please, try again.'));
            }
        }
        //$usuario = $this->Usuario->find('list', ['limit' => 200]);
        $this->set(compact('administrador'));
        $this->set('_serialize', ['administrador']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrador id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrador = $this->Administrador->get($id, [
            'contain' => ['Usuario']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$administrador = $this->Administrador->patchEntity($administrador, $this->request->data);
            $administrador = $this->Administrador->patchEntity($administrador, $this->request->data, [
                'associated'=>'Usuario'                
            ]);
            if ($this->Administrador->save($administrador)) {
                $this->Flash->success(__('The administrador has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The administrador could not be saved. Please, try again.'));
            }
        }
        $usuario = $this->Administrador->Usuario->find('list', ['limit' => 200]);
        $this->set(compact('administrador', 'usuario'));
        $this->set('_serialize', ['administrador']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrador id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrador = $this->Administrador->get($id);
        if ($this->Administrador->delete($administrador)) {
            $this->Flash->success(__('The administrador has been deleted.'));
        } else {
            $this->Flash->error(__('The administrador could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
