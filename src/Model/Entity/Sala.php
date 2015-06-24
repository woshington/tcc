<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sala Entity.
 */
class Sala extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'turma' => true,
    ];
}
