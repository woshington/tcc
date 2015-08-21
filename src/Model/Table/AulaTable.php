<?php
namespace App\Model\Table;

use App\Model\Entity\Aula;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aula Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Disciplina
 * @property \Cake\ORM\Association\BelongsTo $Calendario
 */
class AulaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('aula');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Disciplina', [
            'foreignKey' => 'disciplina_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Calendario', [
            'foreignKey' => 'calendario_id',
            'joinType' => 'INNER'
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
            ->requirePresence('status', 'create')
            ->notEmpty('status');
            
        $validator
            ->add('data_aula', 'valid', ['rule' => 'date'])
            ->requirePresence('data_aula', 'create')
            ->notEmpty('data_aula');
            
        $validator
            ->add('aula', 'valid', ['rule' => 'numeric'])
            ->requirePresence('aula', 'create')
            ->notEmpty('aula');

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
        $rules->add($rules->existsIn(['disciplina_id'], 'Disciplina'));
        $rules->add($rules->existsIn(['calendario_id'], 'Calendario'));
        return $rules;
    }
}
