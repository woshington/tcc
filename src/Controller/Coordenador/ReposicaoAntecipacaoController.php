<?php
namespace App\Controller\Coordenador;

use App\Controller\AppController;

/**
 * ReposicaoAntecipacao Controller
 *
 * @property \App\Model\Table\ReposicaoAntecipacaoTable $ReposicaoAntecipacao
 */
class ReposicaoAntecipacaoController extends AppController
{

    public function index()
    {
        $this->loadModel('Professor');
        $this->loadModel('Coordenador');
        $coordenador = $this->Coordenador->find()
            ->contain(['Professor'])
            ->where(['Professor.usuario_id'=>$this->Auth->user('id')])
            ->first();
       
        
        $this->set(compact('coordenador'));
        
    }        

    public function view($id){
        $reposicaoAntecipacao = $this->ReposicaoAntecipacao->get($id, [
            'contain'=>[
                'AulaReposicaoAntecipacao'=>[
                    'Aula'=>[
                        'Calendario'=>[
                            'Turma'=>['Curso']
                        ]
                    ]
                ]
            ]
        ]);
        if($this->request->is(['post', 'put'])){
            $reposicaoAntecipacao = $this->ReposicaoAntecipacao->patchEntity($reposicaoAntecipacao, $this->request->data);
            if ($this->ReposicaoAntecipacao->save($reposicaoAntecipacao)) {
                $this->Flash->success('Reposição atualizada com sucesso.');
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error('Reposição atualizada com sucesso.');
            }
        }
        $this->set(compact('reposicaoAntecipacao'));
        $this->set('_serialize', [$reposicaoAntecipacao]);
    }
}
