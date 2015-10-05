<?php
namespace App\Model\Table;

use App\Model\Entity\Eixo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eixo Model
 *
 * @property \Cake\ORM\Association\HasMany $Professor
 */
class EixoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('eixo');
        $this->displayField('descricao');
        $this->primaryKey('id');
        $this->hasMany('Professor', [
            'foreignKey' => 'eixo_id'
        ]);
        $this->hasMany('Curso', [
            'foreignKey' => 'eixo_id'
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

        return $validator;
    }
}
