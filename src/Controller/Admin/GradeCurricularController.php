<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * GradeCurricular Controller
 *
 * @property \App\Model\Table\GradeCurricularTable $GradeCurricular
 */
class GradeCurricularController extends AppController
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

    /**
     * View method
     *
     * @param string|null $id Grade Curricular id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->GradeCurricular->Disciplina->find('list', ['limit' => 200]);
        $gradeCurricular = $this->GradeCurricular->get($id, [
            'contain' => ['Disciplina', 'Professor', 'Turma']
        ]);
        $this->set('gradeCurricular', $gradeCurricular);
        $this->set('_serialize', ['gradeCurricular']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Curso');
        $this->loadModel('Disciplina');
        
        $professor = $this->Professor->find('all', [
            'contain' => ['Usuario'],
            'order'=>['Usuario.nome']
        ])->first();
        $gradeCurricular = $this->GradeCurricular->newEntity();
        if ($this->request->is('post')) {
            foreach ($this->request->data['disciplina_id'] as $disciplina) {
                $gradeCurricular = $this->GradeCurricular->newEntity();
                $gradeCurricular->cargaHoraria = 0;
                $gradeCurricular->obrigatorio = false;
                $gradeCurricular->professor_id = $professor->id;
                $gradeCurricular->turma_id = $this->request->data['turma'];
                $gradeCurricular->disciplina_id = $disciplina;
                $this->GradeCurricular->save($gradeCurricular);
            }
            $this->redirect(['action'=>'editarGrade', $gradeCurricular->turma_id]);
        }        
        $cursos = $this->Curso->find('list');
        $disciplinas = $this->Disciplina->find('list');
        $this->set(compact('cursos', 'disciplinas', 'gradeCurricular'));
    }


    public function save(){
        $this->layout = 'ajax';
        $grade = $this->GradeCurricular->newEntity();
        $grade = $this->GradeCurricular->patchEntity($grade, $this->request->data);
        $grade->obrigatorio = isset($this->request->data['obrigatorio']) ? 1 : 0;
        if ($this->GradeCurricular->save($grade)) {
            echo true;
        } else {
            echo false;
        }
    }

    public function edit(){
        $this->layout = 'ajax';
        if($this->request->is('post')){
            $grade = $this->GradeCurricular->get($this->request->data['id'], [
                'contain' => []
            ]);
            $grade = $this->GradeCurricular->patchEntity($grade, $this->request->data);
            $grade->obrigatorio = isset($this->request->data['obrigatorio']) ? 1 : 0;
            if ($this->GradeCurricular->save($grade)) {
                echo true;
            } else {
                echo false;
            }            
        }
    }

    public function verGrade($turma_id = null){
        $turma = $this->GradeCurricular->Turma->get($turma_id);
        
        $this->paginate = [
            'contain' => ['Disciplina', 'Professor', 'Turma'],
            'conditions'=>['Turma.id'=>$turma_id]
        ];
        $this->set('gradeCurricular', $this->paginate($this->GradeCurricular));
        $this->set(compact('turma'));
        $this->set('_serialize', ['gradeCurricular']);
    }

    public function editarGrade($turma_id = null){
        $this->loadModel('Professor');
        if ($this->request->is(['patch', 'post', 'put'])) {            
        }

        $grade = $this->GradeCurricular->find('all', [
            'conditions'=>[
                'turma_id'=>$turma_id,
            ],
            'contain'=>['Disciplina', 'Professor', 'Turma']
        ]);
        $disciplinas = $this->GradeCurricular->Disciplina->find('list');
        $turma = $this->GradeCurricular->Turma->get($turma_id);
        $professores = $this->Professor->getList();
        $this->set(compact('grade', 'disciplinas', 'professores', 'turma'));
        $this->set('_serialize', ['grade']);
    }

    public function getGrade($id=null){
        $this->layout = 'ajax';
        $this->autoRender = FALSE;
        echo json_encode($this->GradeCurricular->get($id)->toArray());
    }

    public function getGradeTurma($turma_id=null){
        $this->layout = 'ajax';
        $this->autoRender = FALSE;
        $grades = $this->GradeCurricular->find()->contain([
            'Disciplina',
            'Professor'
        ])->where([
            'turma_id'=>$turma_id
        ])->toArray();
        
        $gradeDis = array();
        //pr($grades);
        foreach ($grades as $key => $grade) {
            $gradeDis[$key]['id'] = $grade->id;
            $gradeDis[$key]['disciplina'] = $grade->disciplina->nome;
            $gradeDis[$key]['professor'] = $grade->professor->usuarios->nome;
            $gradeDis[$key]['obrigatorio'] = $grade->obrigatorio;
            $gradeDis[$key]['carga_horaria'] = $grade->carga_horaria;
            //pr();
        }
        echo json_encode($gradeDis);
    }

    public function deleteGrade($id=null){
        $this->layout = 'ajax';
        $this->autoRender = FALSE;

        $grade = $this->GradeCurricular->get($id);        
        if ($this->GradeCurricular->delete($grade)) {
            echo true;
        }else{
            echo false;
        }
    }
}