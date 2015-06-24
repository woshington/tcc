<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Professor Entity.
 */
class Professor extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'coordenador' => true,
        'usuario_id' => true,
        'eixo_id' => true,
        'usuario' => true,
        'eixo' => true,
    ];
}
