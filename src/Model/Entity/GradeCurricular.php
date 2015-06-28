<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GradeCurricular Entity.
 */
class GradeCurricular extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'carga_horaria' => true,
        'obrigatorio' => true,
        'disciplina_id' => true,
        'professor_id' => true,
        'turma_id' => true,
        'disciplina' => true,
        'professor' => true,
        'curso' => true,
    ];
}
