<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
        'data_aula' => true,
        'aula' => true,
        'disciplina_id' => true,
        'calendario_id' => true,
        'disciplina' => true,
        'calendario' => true,
    ];
}
