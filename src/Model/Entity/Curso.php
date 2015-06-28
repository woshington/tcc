<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Curso Entity.
 */
class Curso extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'descricao' => true,
        'sigla' => true,
        'modalidade_id' => true,
        'modalidade' => true,
        'grade_curricular' => true,
        'turma' => true,
    ];
}
