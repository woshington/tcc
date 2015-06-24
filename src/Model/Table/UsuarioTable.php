<?php
namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuario Model
 *
 * @property \Cake\ORM\Association\HasMany $Administrador
 * @property \Cake\ORM\Association\HasMany $Professor
 */
class UsuarioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('usuario');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->hasMany('Administrador', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Professor', [
            'foreignKey' => 'usuario_id'
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
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', [
                'unique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table',
                    'message'=>'Email ja cadastrado!'
                ]
            ]);

            
        $validator
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');
            
        $validator
            ->add('ativo', 'valid', ['rule' => 'boolean'])
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');
            
        $validator
            ->requirePresence('matricula', 'create')
            ->notEmpty('matricula');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
