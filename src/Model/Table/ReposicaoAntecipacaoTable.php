<?php
namespace App\Model\Table;

use App\Model\Entity\ReposicaoAntecipacao;
use App\Model\Entity\Calendario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
/**
 * ReposicaoAntecipacao Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Aula
 */
class ReposicaoAntecipacaoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('reposicao_antecipacao');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('AulaReposicaoAntecipacao');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');            
        $validator
            ->requirePresence('justificativa', 'create')
            ->notEmpty('justificativa');
            
        $validator
            ->allowEmpty('observacao');
            
        $validator
            ->add('dataReposicao', 'valid', ['rule' => 'date'])
            ->requirePresence('dataReposicao', 'create')
            ->notEmpty('dataReposicao');

        return $validator;
    }

    public function saveAntecipacao(ReposicaoAntecipacao $reposicao, array $antecipacoes, Calendario $cal){        
        $aulas = $this->AulaReposicaoAntecipacao->Aula->find()
        ->where([
            'calendario_id'=>$cal->id,
            'aula IN '=>$antecipacoes
        ]);

        $tudoCerto = true;
//        $this->connection()->transactional(function () use ($reposicao, $aulas, $tudoCerto) {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->save($reposicao);
        foreach ($aulas as $aula) {
            $aulaReposicaoAntecipacao = $this->AulaReposicaoAntecipacao->newEntity([
                'aula_repor'=>$aula->aula,
                'reposicao_antecipacao_id'=>$reposicao->id,
                'aula_id'=>$aula->id,
                'status'=>'C'
            ]);
            //pr($)
            if(!$this->AulaReposicaoAntecipacao->save($aulaReposicaoAntecipacao)){
                $tudoCerto = false;
            }
        }
        if($tudoCerto == true){
            $conn->commit();
            return true;
        }
        $conn->rollback();
        return false;
    }
}
