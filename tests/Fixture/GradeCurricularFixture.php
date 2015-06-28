<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GradeCurricularFixture
 *
 */
class GradeCurricularFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'grade_curricular';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'carga_horaria' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'obrigatorio' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'disciplina_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'professor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'turma_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_grade_curricular_disciplina1_idx' => ['type' => 'index', 'columns' => ['disciplina_id'], 'length' => []],
            'fk_grade_curricular_professor1_idx' => ['type' => 'index', 'columns' => ['professor_id'], 'length' => []],
            'fk_grade_curricular_turma1_idx' => ['type' => 'index', 'columns' => ['turma_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_grade_curricular_disciplina1' => ['type' => 'foreign', 'columns' => ['disciplina_id'], 'references' => ['disciplina', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_grade_curricular_professor1' => ['type' => 'foreign', 'columns' => ['professor_id'], 'references' => ['professor', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_grade_curricular_turma1' => ['type' => 'foreign', 'columns' => ['turma_id'], 'references' => ['turma', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'carga_horaria' => 1,
            'obrigatorio' => 1,
            'disciplina_id' => 1,
            'professor_id' => 1,
            'turma_id' => 1
        ],
    ];
}
