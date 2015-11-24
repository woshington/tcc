<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
/**
 * Turma Entity.
 */
class Turma extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = ['*'=>true];


    protected function _getReposicoes(){
        $connection = ConnectionManager::get('default');
       
        $sql = "SELECT ara.id, ara.aula_repor, ara.aula_id, ra.dataReposicao, ara.status, d.nome as disciplina,  
                u.nome as professor 
                FROM turma as t inner join
                grade_curricular as gc on t.id = gc.turma_id inner join
                disciplina as d on gc.disciplina_id = d.id inner join
                professor as p on gc.professor_id = p.id inner join
                usuario as u on p.usuario_id = u.id inner join
                calendario as c on t.id = c.turma_id inner join
                aula as a on c.id = a.calendario_id and d.id = a.disciplina_id inner join
                aula_reposicao_antecipacao as ara on a.id = ara.aula_id inner join
                reposicao_antecipacao as ra on ara.reposicao_antecipacao_id = ra.id
                WHERE (t.id = ".$this->id.") and (ra.dataReposicao = '".date('Y-m-d')."') 
                AND (NOT coalesce(ra.status,'') IN('RC', 'AC'))";                
                // /echo $sql;
        return $connection->execute($sql)->fetchall('assoc');
    }

    public function _getAulasDia(){
        $connection = ConnectionManager::get('default');
        $data = Time::now();

        $dataTime = mktime(0,0,0, $data->month, $data->day, $data->year);
        $data_dia = getdate($dataTime);

        $sql = "SELECT h.id, h.aula, d.nome as disciplina, u.nome professor, 
            CASE WHEN a.status IS NULL THEN 'P' ELSE a.status END  as status,
            ara.status as ministrou_antecipacao
            FROM horario as h inner join 
            grade_curricular as gc on h.grade_curricular_id = gc.id inner join 
            turma as t on t.id = gc.turma_id inner join 
            calendario as c on c.turma_id = t.id inner join
            disciplina as d on gc.disciplina_id = d.id inner join 
            professor as p on gc.professor_id = p.id inner join 
            usuario as u on p.usuario_id = u.id left outer join
            aula as a on a.calendario_id = c.id and a.aula = h.aula inner join
            aula_reposicao_antecipacao as ara on a.id = ara.aula_id
            WHERE c.data = '".$data->i18nFormat('yyyy-MM-dd')."' and c.letivo = true 
            and h.dia = ".$data_dia['wday'] . " and t.id = ".$this->id.
            " order by t.turno, h.aula";
        return $connection->execute($sql)->fetchall('assoc');
    }
}
