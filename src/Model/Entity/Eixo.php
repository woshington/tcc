<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Eixo Entity.
 */
class Eixo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'descricao' => true,
        'professor' => true,
    ];
}
