<?php
namespace App\Model\Table;

use App\Model\Entity\Curso;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Curso Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Modalidade
 * @property \Cake\ORM\Association\HasMany $Turma
 */
class CursoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('curso');
        $this->displayField('sigla');
        $this->primaryKey('id');
        $this->belongsTo('Modalidade', [
            'foreignKey' => 'modalidade_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Turma', [
            'foreignKey' => 'curso_id'
        ]);
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');
            
        $validator
            ->requirePresence('sigla', 'create')
            ->notEmpty('sigla');

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
        $rules->add($rules->existsIn(['modalidade_id'], 'Modalidade'));
        return $rules;
    }
}