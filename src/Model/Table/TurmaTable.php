<?php
namespace App\Model\Table;

use App\Model\Entity\Turma;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turma Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Curso
 * @property \Cake\ORM\Association\BelongsTo $Sala
 * @property \Cake\ORM\Association\HasMany $GradeCurricular
 */
class TurmaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('turma');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->belongsTo('Curso', [
            'foreignKey' => 'curso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sala', [
            'foreignKey' => 'sala_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('GradeCurricular', [
            'foreignKey' => 'turma_id'
        ]);
        $this->hasMany('Calendario', [
            'foreignKey' => 'turma_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');
            
        $validator
            ->add('ano', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ano', 'create')
            ->notEmpty('ano');
            
        $validator
            ->requirePresence('turno', 'create')
            ->notEmpty('turno');
            
        $validator
            ->add('ativo', 'valid', ['rule' => 'boolean'])
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

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
        $rules->add($rules->existsIn(['curso_id'], 'Curso'));
        $rules->add($rules->existsIn(['sala_id'], 'Sala'));
        return $rules;
    }
}
