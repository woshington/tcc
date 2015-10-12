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

    public function getAulas($data=null, $turma_id=null){
        $this->layout = 'ajax';
        $dt = explode("-", $data);
        $dataTime = mktime(0,0,0, $dt[1], $dt[2], $dt[0]);
        $dia = getdate($dataTime);
        $this->loadModel('Horario');
        $usuario = $this->Usuario->get($this->Auth->user('id'), ['contain'=>'Professor']);

        $horario['horario']= $this->Horario->find()
            ->where([
                'dia'=>$dia['wday'],
                'GradeCurricular.professor_id'=>$usuario->professor->id,
                'GradeCurricular.turma_id'=>$turma_id
            ])
            ->contain(['GradeCurricular'=>['Disciplina']])
            ->order(['aula'])
            ->toArray();
        echo json_encode($horario);
    }
}
