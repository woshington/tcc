<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calendario Entity.
 */
class Calendario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'data' => true,
        'letivo' => true,
        'observacao' => true,
        'turma_id' => true,
        'turma' => true,
        'aula' => true,
    ];
}
