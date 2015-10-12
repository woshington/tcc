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

    public function getDiasLetivos($turma_id=null, $limite=9){
        $this->layout= 'ajax';
        $this->loadModel('Calendario');
        $this->loadModel('Horario');
        $this->loadModel('Usuario');
        $usuario=$this->Usuario->get($this->Auth->user('id'), ['contain'=>'Professor']);
        $dias = $this->Horario->find('list', [
                'keyField'=>'id',
                'valueField'=>'dia'
            ])
            ->where([
                'GradeCurricular.professor_id'=>$usuario->professor->id,
                'GradeCurricular.turma_id'=>$turma_id
            ])
            ->contain(['GradeCurricular'])
            ->toArray();
        foreach ($dias as $key => $dia) {
            $dias[$key] = $dia+1;
        }

        $datas['dias'] = $this->Calendario->find()
            ->select([
                'dia'=>"extract(DAY FROM data)",
                'mes'=>"extract(MONTH FROM data)",
                'ano'=>"extract(YEAR FROM data)"
            ])
            ->where([
                'turma_id'=>$turma_id, 
                'letivo'=>true,
                'data >'=>date('Y-m-d'),
                'DAYOFWEEK(data) in'=>$dias
            ])
            ->limit($limite)
            ->toArray();
        echo json_encode($datas);
    }
}
