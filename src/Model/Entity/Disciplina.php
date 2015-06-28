<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disciplina Entity.
 */
class Disciplina extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'grade_curricular' => true,
    ];
}
