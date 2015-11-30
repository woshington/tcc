<?php
namespace App\Model\Table;

use App\Model\Entity\AulaReposicaoAntecipacao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

/**
 * AulaReposicaoAntecipacao Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ReposicaoAntecipacao
 * @property \Cake\ORM\Association\BelongsTo $Aula
 */
class AulaReposicaoAntecipacaoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('aula_reposicao_antecipacao');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('ReposicaoAntecipacao', [
            'foreignKey' => 'reposicao_antecipacao_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Aula', [
            'foreignKey' => 'aula_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator->add('status', 'custom', [
            'rule' => [$this, 'validaConfronto'],
            'message'=>'Confronto de aulas!'
        ]);         
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['reposicao_antecipacao_id'], 'ReposicaoAntecipacao'));
        $rules->add($rules->existsIn(['aula_id'], 'Aula'));
        return $rules;
    }

    public function validaConfronto($status, $context){
        $repo = TableRegistry::get('ReposicaoAntecipacao');
        $aula = TableRegistry::get('Aula');
        $reposicao = $repo->get($context['data']['reposicao_antecipacao_id']);
        
        $aula = $aula->find()
            ->where(['Aula.id'=>$context['data']['aula_id']])
            ->contain(['Calendario'])
            ->first();
        // echo $aula->calendario->turma_id;
        $now = Time::parse($reposicao->dataReposicao);
        $data = $now->i18nFormat('YYYY-MM-dd');
        $connection = ConnectionManager::get('default');
        
        $sql = "SELECT count(*) as qt 
                FROM reposicao_antecipacao as ra inner join
                aula_reposicao_antecipacao as ara on ra.id = ara.reposicao_antecipacao_id inner join
                aula as a on ara.aula_id = a.id inner join
                calendario as c on a.calendario_id = c.id
                WHERE ra.dataReposicao = '".$data."' and 
                c.turma_id = ".$aula->calendario->turma_id." and ara.aula_repor = ".$context['data']['aula_repor'];
        $confronto = $connection->execute($sql)->fetch('assoc');
        
        return $confronto['qt']<=0;
    }
}