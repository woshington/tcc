<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Horario Entity.
 */
class Horario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'dia' => true,
        'aula' => true,
        'hora_inicio' => true,
        'hora_termino' => true,
        'grade_curricular_id' => true,
        'grade_curricular' => true,
    ];

    
}
