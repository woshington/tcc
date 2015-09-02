<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Aula Controller
 *
 * @property \App\Model\Table\AulaTable $Aula
 */
class AulaController extends AppController{    

	public function index(){
		$this->loadModel('Calendario');
		$this->loadModel('Horario');
		$this->loadModel('Turma');

		$turmas = $this->Calendario->find('list', [
			'keyField'=>'turma.id',
			'valueField'=>'turma.nome',			
			'contain'=>['Turma'],
			'conditions'=>[
				'Calendario.data'=>date('Y-m-d'),
				'Calendario.letivo'=>true,
				'Turma.ativo'=>true,
			]
		])->toArray();
		
		$dataTime = mktime(0,0,0, date('m'), date('d'), date('Y'));		
		$data_dia = getdate($dataTime);
		$horarios = array();

		
		$aulas = [];
		foreach ($turmas as $key => $turma) {
			$horarios[$key] = $this->Horario->find()
				->where([
					'dia'=>$data_dia['wday'],
					'Turma.id'=>$key
				])
				->contain([
					'GradeCurricular'=>['Turma', 'Disciplina', 'Professor']
				])
				->order(['Turma.turno', 'Horario.aula']);			
		}
		$aulas = $this->Aula->find()
			->contain(['Calendario'=>['Turma']])
			->where([
				'Turma.ativo'=>true,
				'Calendario.data'=>date('Y-m-d'),
				'Calendario.letivo'=>true
			])->toArray();
			
		$aulasRegistradas = [];

		foreach ($aulas as $aula) {
			$aulasRegistradas[$aula->calendario->turma->id][$aula->aula] = $aula->status;
		}
		$this->set(compact('horarios', 'turmas', 'aulasRegistradas'));
    }
    public function confirmar($horario_id, $faltou = false){
    	$this->loadModel('Horario');
    	$this->loadModel('Calendario');
    	$horario = $this->Horario->get($horario_id, [
    		'contain'=>['GradeCurricular'=>['Disciplina', 'Turma']]
    	]);
    	
    	$calendario = $this->Calendario->find()
    		->where([
    			'data'=>date('Y-m-d'), 
    			'turma_id'=>$horario->grade_curricular->turma_id
    		])
    		->first();
    	$aula = $this->Aula->find()
    		->where([
    			'aula'=>$horario->aula,
	    		'disciplina_id'=>$horario->grade_curricular->disciplina_id,
	    		'calendario_id'=>$calendario->id
    		])
    		->first();
    	if(!$aula){
    		$aula = $this->Aula->newEntity();
	    	$aula->set([
	    		'status' => $faltou ? "F" : "M",
	    		'aula'=>$horario->aula,
	    		'disciplina_id'=>$horario->grade_curricular->disciplina_id,
	    		'calendario_id'=>$calendario->id
	    	]);
    	}else{
    		$aula->status = $faltou ? "F" : "M";
    	}
    	if($this->Aula->save($aula)){
    		$this->Flash->success(__('Aula registrada com sucesso.'));    		
    	}else{
    		$this->Flash->error(__('Aula nao registrada. Please, try again.'));
    	}
    	return $this->redirect(['action'=>'index']);
    }

    public function faltaTurma(){
    	$turma = $this->Aula->find()
    		->select(['Turma.id', 'Turma.nome', 'qt'=>'count(*)'])
    		->group(['Turma.id', 'Turma.nome'])
    		->contain(['Calendario'=>['Turma']])
    		->where(['Aula.status'=>'F'])
    		->autoFields(true);
    	$this->set(compact('turma'));
    }

    public function viewFaltas($idTurma){
    	$this->loadModel('Turma');
    	$faltas = $this->Aula->find()
    		->contain(['Disciplina','Calendario'=>['Turma']])
    		->where(['Aula.status'=>'F', 'Turma.id'=>$idTurma])
    		->order(['Calendario.data', 'Aula.aula']);

    	$turma = $this->Turma->get($idTurma);

    	$this->set(compact(['faltas', 'turma']));
    }
}
