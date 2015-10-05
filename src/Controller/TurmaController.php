<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Aula Controller
 *
 * @property \App\Model\Table\AulaTable $Aula
 */
class TurmaController extends AppController
{

    public function index(){
        $this->loadModel('Usuario');
        $usuario = $this->Usuario->get($this->Auth->user('id'), [
            'contain'=>['Professor']
        ]);

        $grade = $this->Turma->GradeCurricular->find()
            ->distinct(['turma_id'])
            ->contain(['Turma'])
            ->where(['professor_id'=>$usuario->professor->id]);
        
        $this->set('grade', $grade);
        $this->set('_serialize', ['grade']);
    }
}
