<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Aula Controller
 *
 * @property \App\Model\Table\AulaTable $Aula
 */
class AulaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function verFaltas()
    {
        
        $this->loadModel('Usuario');
        
        $usuario = $this->Usuario->get($this->Auth->user('id'), [
            'contain'=>['Professor']
        ]);
        
        $faltas = $usuario->professor->faltas;
        $this->set(compact('faltas'));
    }
}
