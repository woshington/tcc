<?php
namespace App\Model\Table;

use App\Model\Entity\Sala;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sala Model
 *
 * @property \Cake\ORM\Association\HasMany $Turma
 */
class SalaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('sala');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->hasMany('Turma', [
            'foreignKey' => 'sala_id'
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
}
