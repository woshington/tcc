<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Turma Entity.
 */
class Turma extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'ano' => true,
        'turno' => true,
        'ativo' => true,
        'curso_id' => true,
        'sala_id' => true,
        'curso' => true,
        'sala' => true,
    ];
}
