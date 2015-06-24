<?php
namespace App\Model\Table;

use App\Model\Entity\Modalidade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modalidade Model
 *
 * @property \Cake\ORM\Association\HasMany $Curso
 */
class ModalidadeTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('modalidade');
        $this->displayField('descricao');
        $this->primaryKey('id');
        $this->hasMany('Curso', [
            'foreignKey' => 'modalidade_id'
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
            ->add('tempoAula', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tempoAula', 'create')
            ->notEmpty('tempoAula')
            ->add('tempoAula', 'inList', [
                'rule'=>['inList', [50, 60]],
                'message'=>'Carga horária invalida!'
            ]);

        return $validator;
    }
}
