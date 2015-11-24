<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

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
    protected $_accessible = ['*'=>true];

    protected function _getMinistrada(){
    	$connection = ConnectionManager::get('default');
       
        $sql = "SELECT count(*) as qt, m.tempoAula
				FROM grade_curricular as gc inner join
					 turma as t on t.id = gc.turma_id inner join 
                     curso as cs on t.curso_id = cs.id inner join
                     modalidade as m on cs.modalidade_id = m.id inner join
                     calendario as c on t.id = c.turma_id inner join
				     aula as a on a.calendario_id = c.id and a.disciplina_id = gc.disciplina_id left outer join
				     aula_reposicao_antecipacao as ara on a.id = ara.aula_id
				where (a.status = 'M' or ara.status = 'M') and (gc.id = ".$this->id.")
                group by tempoAula";
        return $connection->execute($sql)->fetch('assoc');
    }
}
