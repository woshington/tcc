<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfessorFixture
 *
 */
class ProfessorFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'professor';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'coordenador' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'eixo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_professor_usuario_idx' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
            'fk_professor_eixo1_idx' => ['type' => 'index', 'columns' => ['eixo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_professor_eixo1' => ['type' => 'foreign', 'columns' => ['eixo_id'], 'references' => ['eixo', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_professor_usuario' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuario', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'coordenador' => 1,
            'usuario_id' => 1,
            'eixo_id' => 1
        ],
    ];
}
