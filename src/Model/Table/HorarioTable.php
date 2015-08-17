<?php
namespace App\Model\Table;

use App\Model\Entity\Horario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Horario Model
 *
 * @property \Cake\ORM\Association\BelongsTo $GradeCurricular
 */
class HorarioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('horario');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('GradeCurricular', [
            'foreignKey' => 'grade_curricular_id',
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
            ->add('dia', 'valid', ['rule' => 'numeric'])
            ->requirePresence('dia', 'create')
            ->notEmpty('dia');
            
        $validator
            ->add('aula', 'valid', ['rule' => 'numeric'])
            ->requirePresence('aula', 'create')
            ->notEmpty('aula');
            
        $validator
            ->add('hora_inicio', 'valid', ['rule' => 'time'])
            ->requirePresence('hora_inicio', 'create')
            ->notEmpty('hora_inicio');
            
        $validator
            ->add('hora_termino', 'valid', ['rule' => 'time'])
            ->requirePresence('hora_termino', 'create')
            ->notEmpty('hora_termino');

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
        $rules->add($rules->existsIn(['grade_curricular_id'], 'GradeCurricular'));
        return $rules;
    }

    public function beforeSave(Event $event, Entity $horario){
        if($horario->isNew()){
            $grade = TableRegistry::get('GradeCurricular');
            $grade = $grade->get($horario->grade_curricular_id);
            $hr = $this->find('all')
                ->where([
                    'GradeCurricular.turma_id'=>$grade->turma_id,
                    'Horario.dia'=>$horario->dia,
                    'Horario.aula'=>$horario->aula,
                ])
                ->contain(['GradeCurricular'])->first();
            if($hr){                
                $horario->id = $hr->id;
            }
            return true;
        }
    }
}
