<?php
namespace App\Controller\Admin;

use App\Controller\AppController;



/**
 * Usuario Controller
 *
 * @property \App\Model\Table\UsuarioTable $Usuario
 */
class UsuarioController extends AppController
{


    public function index(){
        $this->paginate = [
            'contain'=>['Administrador', 'Professor']
        ];
        $this->set('usuario', $this->paginate($this->Usuario));
        $this->set('_serialize', ['usuario']);
    }
    public function novaSenha($id = null){
        $usuario = $this->Usuario->get($id, [
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
