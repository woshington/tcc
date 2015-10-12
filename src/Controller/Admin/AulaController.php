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
		$this->loadModel('Turma');
		$turmas = $this->Turma->find()
			->where(['Turma.ativo'=>true]);		
		
		$this->set(compact('horarios', 'turmas', 'aulasRegistradas', 'data', 'reposicoes'));
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

    public function confirmarReposicao($reposicaoId, $faltou = false){
        $this->loadModel('AulaReposicaoAntecipacao');

        $aulaReposicao = $this->AulaReposicaoAntecipacao->get($reposicaoId);
        $aulaReposicao->status = $faltou==true ? 'F' : 'M';
        if($this->AulaReposicaoAntecipacao->save($aulaReposicao)){
            $this->Flash->success(__('Aula registrada com sucesso.'));          
        }else{
            $this->Flash->error(__('Aula nao registrada. Please, try again.'));
        }
        return $this->redirect(['action'=>'index']);
    }
}
