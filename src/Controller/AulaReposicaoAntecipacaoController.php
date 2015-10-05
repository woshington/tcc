<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AulaReposicaoAntecipacao Controller
 *
 * @property \App\Model\Table\AulaReposicaoAntecipacaoTable $AulaReposicaoAntecipacao
 */
class AulaReposicaoAntecipacaoController extends AppController
{

    public function view($reposicao_id = null)
    {
        $aulaReposicaoAntecipacao = $this->AulaReposicaoAntecipacao->find()
            ->where(['ReposicaoAntecipacao.id'=>$reposicao_id])
            ->contain(['ReposicaoAntecipacao', 'Aula'=>['Calendario'=>['Turma'=>['Curso']]]]);

        $this->set('aulaReposicaoAntecipacao', $aulaReposicaoAntecipacao);
        $this->set('_serialize', ['aulaReposicaoAntecipacao']);
    }


}
