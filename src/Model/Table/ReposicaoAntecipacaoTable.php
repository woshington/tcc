<?php
namespace App\Model\Table;

use App\Model\Entity\ReposicaoAntecipacao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
}
