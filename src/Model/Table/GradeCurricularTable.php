<?php
namespace App\Model\Table;

use App\Model\Entity\GradeCurricular;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GradeCurricular Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Disciplina
 * @property \Cake\ORM\Association\BelongsTo $Professor
 * @property \Cake\ORM\Association\BelongsTo $Turma
 */
class GradeCurricularTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('grade_curricular');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Disciplina', [
            'foreignKey' => 'disciplina_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Professor', [
            'foreignKey' => 'professor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Turma', [
            'foreignKey' => 'turma_id',
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
            ->add('carga_horaria', 'valid', ['rule' => 'numeric'])
            ->requirePresence('carga_horaria', 'create')
            ->notEmpty('carga_horaria');
            
        $validator
            ->add('obrigatorio', 'valid', ['rule' => 'boolean'])
            ->requirePresence('obrigatorio', 'create')
            ->notEmpty('obrigatorio');

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
        $rules->add($rules->existsIn(['professor_id'], 'Professor'));
        $rules->add($rules->existsIn(['turma_id'], 'Turma'));
        return $rules;
    }
}
