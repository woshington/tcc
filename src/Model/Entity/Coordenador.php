<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Coordenador Entity.
 */
class Coordenador extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*'=>true,
    ];


    protected function _getReposicoesPendentes(){
        $connection = ConnectionManager::get('default');
        $professor = TableRegistry::get('Professor'); 
        $professor = $professor->get($this->professor_id);

        $sql = "select ra.id, a.id as aula_id, u.nome, c.data, t.nome as turma,
        	ra.dataReposicao as data_reposicao, ra.justificativa
            from grade_curricular as g inner join
            turma as t on g.turma_id = t.id inner join
            curso as cs on t.curso_id = cs.id inner join
            calendario as c on t.id = c.turma_id inner join
            aula as a on c.id = a.calendario_id and a.disciplina_id = g.disciplina_id inner join
            disciplina as d on g.disciplina_id = d.id inner join
            reposicao_antecipacao as ra on ra.aula_id = a.id inner join
            professor as p on p.id = g.professor_id inner join 
            usuario as u on p.usuario_id = u.id
        where p.eixo_id = ".$professor->eixo_id." and cs.modalidade_id = ".$this->modalidade_id." 
        	and a.status = 'F' and (ra.status = 'M');";
        return $connection->execute($sql)->fetchAll('assoc');
    }
}
