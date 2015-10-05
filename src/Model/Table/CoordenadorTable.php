<?php
namespace App\Model\Table;

use App\Model\Entity\Coordenador;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Coordenador Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Professor
 * @property \Cake\ORM\Association\BelongsTo $Modalidade
 */
class CoordenadorTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('coordenador');
        $this->displayField('professor_id');
        $this->primaryKey('professor_id');
        
        $this->hasOne('Professor', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'
        ]);
        $this->BelongsTo('Modalidade', [
            'foreignKey' => 'modalidade_id',
            'joinType' => 'INNER'
        ]);
    }


    public function validationDefault(Validator $validator)
    {   
        $validator->add('professor_id', 'custom', [
            'rule' => [$this, 'validaEixo'],
            'message'=>'Eixo modalidade já possui coordenador'
        ]);


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
        $rules->add($rules->existsIn(['professor_id'], 'Professor'));
        $rules->add($rules->existsIn(['modalidade_id'], 'Modalidade'));
        return $rules;
    }

    public function validaEixo($value, $context){
        $professor = TableRegistry::get('Professor');
        $professor = $professor->get($context['data']['professor_id']);
        $existe = $this->find()
            ->contain(['Professor'])
            ->where([
                'Professor.eixo_id'=>$professor->eixo_id,
                'modalidade_id'=>$context['data']['modalidade_id']
            ])->count();

        return $existe <= 0 ;
    }
}
