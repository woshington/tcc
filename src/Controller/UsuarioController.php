<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 */
class UsuarioController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->loadModel('Administrador');
        $this->loadModel('Professor');
        $this->Auth->allow('login');
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view()
    {
        $usuario = $this->Usuario->get($this->Auth->user('id'), [
            'contain' => []
        ]);
        $professor = $this->Professor->findByUsuarioId($usuario->id);
        if($professor->isEmpty()){
            $admin = $this->Administrador->findByUsuarioId($usuario->id)->first();
            return $this->redirect([
                    'prefix'=>'admin', 
                    'controller'=>'administrador', 
                    'action'=>'view', $admin->id]);            
        }else{
            $professor = $professor->first();
            return $this->redirect([
                'prefix'=>$professor->coordenador ? 'coordenador' : false,
                'controller'=>'professor', 
                'action'=>'view']);            
        }
        
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->data);
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    public function login()
    {
        if ($this->request->is('post')) {            
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $admin = $this->Administrador->findByUsuarioId($user['id']);
                if($admin->isEmpty()){
                    $professor = $this->Professor->findByUsuarioId($user['id'])->first();
                    if ($professor->coordenador){
                        return $this->redirect(['prefix'=>'coordenador', 'controller'=>'professor']);
                    }else{
                        return $this->redirect(['prefix'=>false, 'controller'=>'professor', 'action'=>'minhasDisciplinas']);
                    }
                    
                }else{
                    return $this->redirect(['prefix'=>'admin', 'controller'=>'aula']);
                }
                
            }
            $this->Flash->error(__('Invalid username or password, try again'), [
                'key' => 'auth',
            ]);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function novaSenha(){
        $usuario = $this->Usuario->get($this->Auth->user('id'), [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->data);
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));
                return $this->redirect(['controller'=>'index', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }
}
