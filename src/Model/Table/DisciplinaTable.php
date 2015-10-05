<?php
namespace App\Model\Table;

use App\Model\Entity\Disciplina;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Disciplina Model
 *
 * @property \Cake\ORM\Association\HasMany $GradeCurricular
 */
class DisciplinaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('disciplina');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->hasMany('GradeCurricular', [
            'foreignKey' => 'disciplina_id'
        ]);
        $this->hasMany('Aula', [
            'foreignKey' => 'disciplina_id'
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

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome']));
        return $rules;
    }
}
