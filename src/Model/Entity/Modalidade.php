<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modalidade Entity.
 */
class Modalidade extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'descricao' => true,
        'tempoAula' => true,
        'curso' => true,
    ];
}
