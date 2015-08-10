<?php
namespace App\Model\Table;

use App\Model\Entity\Professor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professor Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuario
 * @property \Cake\ORM\Association\BelongsTo $Eixo
 * @property \Cake\ORM\Association\HasMany $GradeCurricular
 */
class ProfessorTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('professor');
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->belongsTo('Usuario', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Eixo', [
            'foreignKey' => 'eixo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('GradeCurricular', [
            'foreignKey' => 'professor_id'
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
            ->add('coordenador', 'valid', ['rule' => 'boolean'])
            ->requirePresence('coordenador', 'create')
            ->notEmpty('coordenador');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuario'));
        $rules->add($rules->existsIn(['eixo_id'], 'Eixo'));
        return $rules;
    }

    public function getList()
    {
        $professores = $this->find('all', ['contain'=>'Usuario']);
        $retorno = array();
        foreach ($professores as $professor) {
            $retorno[$professor->id] = $professor->usuario->nome;
        }
        return $retorno;
    }
}
