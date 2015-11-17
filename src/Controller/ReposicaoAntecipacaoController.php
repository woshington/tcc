<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
/**
 * ReposicaoAntecipacao Controller
 *
 * @property \App\Model\Table\ReposicaoAntecipacaoTable $ReposicaoAntecipacao
 */
class ReposicaoAntecipacaoController extends AppController
{

    public function index(){
        $this->paginate = [
            'conditions'=>[
                "COALESCE(ReposicaoAntecipacao.status, '') <>"=>"RC"
            ]
        ];
        $this->set('reposicaoAntecipacao', $this->paginate($this->ReposicaoAntecipacao));
        $this->set('_serialize', ['reposicaoAntecipacao']);
    }
    public function solicitarReposicao()
    {
        $usuario = $this->Usuario->get($this->Auth->user('id'), [
            'contain'=>['Professor']
        ]);
        $reposicaoAntecipacao = $this->ReposicaoAntecipacao->newEntity();
        $this->loadModel('AulaReposicaoAntecipacao');
        if($this->request->is('post')){            
            $this->request->data['dataReposicao'] = implode("-", array_reverse(explode("/", $this->request->data['dataReposicao'])));
            $data = $this->request->data['aulaReposicaoAntecipacao'];            
            unset($this->request->data['aulaReposicaoAntecipacao']);

            $reposicaoAntecipacao = $this->ReposicaoAntecipacao->newEntity($this->request->data);
            if($this->ReposicaoAntecipacao->save($reposicaoAntecipacao)){                
                $dados = [];
                foreach ( $data as $key => $valor) {                    
                    if(@$valor['repor']==true){                        
                        $dados[] = [
                            'aula_repor'=> $valor['aula_repor'],
                            'reposicao_antecipacao_id' => $reposicaoAntecipacao->id,
                            'aula_id' => $valor['aula_id'],
                            'status'=>'C' 
                        ];                        
                    }
                }
                $aulas = $this->AulaReposicaoAntecipacao->newEntities($dados);
                $solicitou = true;    
                $this->AulaReposicaoAntecipacao->connection()->transactional(function () use ($aulas, &$solicitou) {
                    foreach ($aulas as $entity) {
                        if(!$this->AulaReposicaoAntecipacao->save($entity)){
                            $solicitou = false;
                            break;
                        }
                    }
                });   
                if($solicitou){
                    $this->Flash->success(__('Solicitação efetuada com sucesso!'));
                }else{
                    $reposicaoAntecipacao->status = 'RC';
                    $this->ReposicaoAntecipacao->save($reposicaoAntecipacao);
                    $this->Flash->error(__('Impossivel gravar aula para reposicao!'));
                }
                return $this->redirect(['action'=>'solicitarReposicao']);
            }

        }
        $this->set(compact('usuario', 'reposicaoAntecipacao'));
        $this->set('_serialize', ['reposicaoAntecipacao']);
    }
    public function solicitarAntecipacao(){
        $this->loadModel('Turma');
        $usuario = $this->Usuario->get($this->Auth->user('id'), ['contain'=>'Professor']);
        $turma = $usuario->professor->turmas;
        $reposicaoAntecipacao = $this->ReposicaoAntecipacao->newEntity();
        if($this->request->is('post')){
            $this->loadModel('Calendario');
            $this->loadModel('Horario');
            $this->loadModel('Aula');
            $this->loadModel('AulaReposicaoAntecipacao');

            $calendario = $this->Calendario->findByDataAndTurmaId(
                $this->request->data['data'], 
                $this->request->data['turma']
            )->first();

            $this->Aula->saveAulaAntecipacao($calendario, $this->request->data['antecipar']);

            $reposicao = $this->ReposicaoAntecipacao->newEntity();
            $reposicao->set([
                'justificativa'=>$this->request->data['justificativa'],
                'dataReposicao'=>$this->request->data['dataReposicao'],
                'status'=>'AC'                
            ]);
            
            if($this->ReposicaoAntecipacao->saveAntecipacao($reposicao, $this->request->data['antecipar'], $calendario)){
                $this->Flash->success(__('Solicitação efetuada com sucesso!'));
                $this->redirect(['controller'=>'professor','action'=>'minhasDisciplinas']);
            }else{
                $this->Flash->error(__('Solicitação não efetuada!'));                
            }
        }
        $this->set(compact('turma', 'reposicaoAntecipacao'));
        $this->set('_serialize', ['reposicaoAntecipacao']);
    }
}
 