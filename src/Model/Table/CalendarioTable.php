<?php
namespace App\Model\Table;

use App\Model\Entity\Calendario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;

/**
 * Calendario Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Turma
 * @property \Cake\ORM\Association\HasMany $Aula
 */
class CalendarioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('calendario');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->belongsTo('Turma', [
            'foreignKey' => 'turma_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Aula', [
            'foreignKey' => 'calendario_id'
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
            ->add('data', 'valid', ['rule' => 'date'])
            ->requirePresence('data', 'create')
            ->notEmpty('data');
            
        $validator
            ->add('letivo', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('letivo');
            
        $validator
            ->allowEmpty('observacao');

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
        $rules->add($rules->existsIn(['turma_id'], 'Turma'));
        $rules->add($rules->isUnique(['turma_id', 'data']));
        
        $check = function($calendario) {
            return strtotime($calendario->data) >= strtotime(date('Y-m-d'));
        };
        $rules->addUpdate($check, [
            'errorField' => 'Alterar data',
            'message' => 'Não pode alterar calendário retroativo!'
        ]);
        return $rules;
    }

    public function saveCalendario(Entity $calendario){
        $dia = getdate($calendario->data);
        if(!(($dia['wday']==6 or $dia['wday']==0) and ($calendario->letivo==false))){
            $calendario->data = date('Y-m-d', $calendario->data);
            $calend = $this->find()
            ->where(['data'=>$calendario->data, 'turma_id'=>$calendario->turma_id]);
            if($calend->count()>0){
                $calendario->id = $calend->first()->id;
            }
            $this->save($calendario);        
        }
    }
}
