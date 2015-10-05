<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;


/**
 * Aula Entity.
 */
class Aula extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status' => true,
        'aula' => true,
        'disciplina_id' => true,
        'calendario_id' => true,
        'disciplina' => true,
        'calendario' => true,
    ];

     protected function _getGradeCurricular(){
        $calendario = TableRegistry::get('Calendario');
        $grade = TableRegistry::get('GradeCurricular');
        $cal = $calendario->get($this->calendario_id);            
        $gradeCurricular = $grade->find()
            ->contain(['Professor'=>['Usuario']])
            ->where(['turma_id'=>$cal->turma_id, 'disciplina_id'=>$this->disciplina_id])
            ->first();
        return $gradeCurricular;
    }
}
