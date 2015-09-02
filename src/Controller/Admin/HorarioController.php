<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Horario Controller
 *
 * @property \App\Model\Table\HorarioTable $Horario
 */
class HorarioController extends AppController
{

    public function index()
    {        
        $this->loadModel('Turma');
        $this->paginate = [
            'conditions'=>['ativo'=>true],
            'contain'=>['Curso']

        ];
        $this->set('turma', $this->paginate($this->Turma));
        $this->set('_serialize', ['curso']);
    }

    public function edit($turma_id = null){
        $this->loadModel('Turma');
        $this->loadModel('GradeCurricular');
        $turma = $this->Turma->get($turma_id, [
            'contain' => ['Curso', 'GradeCurricular'],            
        ]); 

        $disciplinas = $this->GradeCurricular->find('list',[
            'keyField'=>'disciplina_id',
            'valueField'=>'disciplina.nome',        
        ])
        ->contain(['Disciplina'])
        ->where(['turma_id'=>$turma_id]);

        $disciplinas = $disciplinas->toArray();
        $disciplinas[0] = 'Vago';
        $disciplinas = (object) $disciplinas;        

        $lista = $this->Horario->find('all')
            ->where(['GradeCurricular.turma_id'=>$turma_id])
            ->contain(['GradeCurricular'])
            ->order(['Horario.dia', 'Horario.aula'])->toArray();
        $lista = (new Collection($lista))->combine('dia', 'grade_curricular.disciplina_id', 'aula')->toArray();
        $horario = $this->Horario->newEntity();
        if($this->request->is('post')){

            
            $dis = $this->request->data['disciplina_id'];            
            foreach ($dis as $dia=>$aula_disc) {
                $dia++;
                foreach ($aula_disc as $aula => $disciplina) {                    
                    $aula++;
                    if($disciplina>0){
                        $grade = $this->GradeCurricular->find()
                            ->where(['turma_id'=>$turma_id, 'disciplina_id'=>$disciplina])
                            ->first();
                    }
                    $hr = $this->Horario->find()
                        ->contain(['GradeCurricular'=>['Turma']])
                        ->where(['dia'=>$dia, 'aula'=>$aula, 'Turma.id'=>$turma->id])
                        ->first();                        
            
                    if($hr){
                        if($disciplina>0){
                           $hr->grade_curricular_id = $grade->id;
                           $this->Horario->save($hr);
                        }else{
                            $this->Horario->delete($hr);
                        }
                    }else{
                        if($disciplina>0){
                            $horario = $this->Horario->newEntity();
                            $horario->dia = $dia;
                            $horario->aula = $aula;
                            
                            $horario->grade_curricular_id = $grade->id;

                            $this->Horario->save($horario);
                        }
                    }                    
                }                 

            }
            $this->redirect(['action'=>'verHorario', $turma->id]);
        }
        
        $this->set(compact('disciplinas', 'turma', 'horario', 'lista'));
        $this->set('_serialize', ['horario']);
    }
    public function verHorario($turma_id = null){
        $this->loadModel('Turma');
        $this->loadModel('Disciplina');

        $turma = $this->Turma->get($turma_id, [
            'contain'=>['Curso']
        ]);
        
        $disciplinas = $this->Disciplina->find('list')->toArray(); 

        $gradeCurricular = $this->Horario->GradeCurricular->find('list',[
            'conditions'=>[
                'GradeCurricular.turma_id'=>$turma_id
            ],            
        ]);
        $grade = $this->Horario->GradeCurricular->find('list',[
            'keyField'=>'id',
            'valueField'=>'disciplina_id',
            'conditions'=>[
                'GradeCurricular.turma_id'=>$turma_id
            ],            
        ])->toArray();

        $hr = $this->Horario->find('all')
            ->where(['Horario.grade_curricular_id IN'=>$gradeCurricular])
            ->order(['Horario.dia', 'Horario.aula']);

        $hr = $hr->toArray();
        $horario = (new Collection($hr))->combine('dia', 'grade_curricular_id', 'aula');
        

        $this->set(compact('disciplinas', 'turma', 'horario', 'grade'));
    }
}
