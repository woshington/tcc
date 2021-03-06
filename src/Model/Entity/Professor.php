<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

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
    protected $_accessible = ['*' => true,];

    protected function _getUsuarios()
    {
        $usuario = TableRegistry::get('Usuario');        
        return $usuario->findById($this->usuario_id)->first();
    }

    protected function _getFaltas()
    {
        $connection = ConnectionManager::get('default');

        $sql = "select a.id, a.aula, c.data, t.nome as turma, d.nome as disciplina, cs.sigla 
                from grade_curricular as g inner join 
                    turma as t on g.turma_id = t.id inner join 
                    curso as cs on t.curso_id = cs.id inner join 
                    calendario as c on t.id = c.turma_id inner join 
                    aula as a on c.id = a.calendario_id and a.disciplina_id = g.disciplina_id inner join 
                    disciplina as d on g.disciplina_id = d.id left outer join
                    aula_reposicao_antecipacao as ara on a.id = ara.aula_id left outer join
                    reposicao_antecipacao as ra on ra.id = ara.reposicao_antecipacao_id
            where professor_id = ".$this->id." and a.status = 'F' and (ra.id is null or ara.status <> 'M') ;";
        return $connection->execute($sql)->fetchAll('assoc');
    }
    
    protected function _getFaltasWithoutSolicitacaoReposicao()
    {
        $connection = ConnectionManager::get('default');

        $sql = "select a.id, a.aula, c.data, t.nome as turma, d.nome as disciplina, cs.sigla 
                from grade_curricular as g inner join 
                    turma as t on g.turma_id = t.id inner join 
                    curso as cs on t.curso_id = cs.id inner join 
                    calendario as c on t.id = c.turma_id inner join 
                    aula as a on c.id = a.calendario_id and a.disciplina_id = g.disciplina_id inner join 
                    disciplina as d on g.disciplina_id = d.id left outer join
                    aula_reposicao_antecipacao as ara on a.id = ara.aula_id left outer join
                    reposicao_antecipacao as ra on ra.id = ara.reposicao_antecipacao_id
            where professor_id = ".$this->id." and a.status = 'F' and (ra.id is null or NOT ara.status IN ('M', 'C')) ;";
            
        return $connection->execute($sql)->fetchAll('assoc');
    }

    public function _getTurmas(){
        $grade = TableRegistry::get('GradeCurricular');
        return $grade->find('list', [
                'keyField'=>'turma.id',
                'valueField'=>'turma.nome',                
            ])            
            ->where(['professor_id'=>$this->id, 'Turma.ativo'=>true])
            ->contain(['Turma'])
            ->toArray();
    }

    public function _getReposicoes(){
        $connection = ConnectionManager::get('default');
        $sql = "select ra.* from aula a inner join
            calendario as c on a.calendario_id = c.id inner join
            disciplina d on a.disciplina_id = d.id   inner join
            turma as t on c.turma_id = t.id inner join
            grade_curricular as gc on gc.disciplina_id = d.id and gc.turma_id = t.id inner join
            professor as p on gc.professor_id = p.id inner join 
            usuario as u on p.usuario_id = u.id inner join
            aula_reposicao_antecipacao as ara on a.id = ara.aula_id inner join
            reposicao_antecipacao as ra on ra.id = ara.reposicao_antecipacao_id
        where (coalesce(ra.status,'')<>'RC') and (p.id = ".$this->id.");";
        return $connection->execute($sql)->fetchAll('assoc');
    }
}
