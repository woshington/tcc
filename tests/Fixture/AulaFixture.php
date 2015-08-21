<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AulaFixture
 *
 */
class AulaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'aula';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'status' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => 'P', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'data_aula' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'aula' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'disciplina_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'calendario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_aula_disciplina1_idx' => ['type' => 'index', 'columns' => ['disciplina_id'], 'length' => []],
            'fk_aula_calendario1_idx' => ['type' => 'index', 'columns' => ['calendario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_aula_calendario1' => ['type' => 'foreign', 'columns' => ['calendario_id'], 'references' => ['calendario', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_aula_disciplina1' => ['type' => 'foreign', 'columns' => ['disciplina_id'], 'references' => ['disciplina', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'status' => 'Lorem ipsum dolor sit ame',
            'modified' => '2015-08-20',
            'data_aula' => '2015-08-20',
            'aula' => 1,
            'disciplina_id' => 1,
            'calendario_id' => 1
        ],
    ];
}
