<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Administrador Entity.
 */
class Administrador extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = ['*'=>true];

    protected function _getUsuario()
    {
        $usuario = TableRegistry::get('Usuario');        
        return $usuario->findById($this->usuario_id)->first();
    }
}
