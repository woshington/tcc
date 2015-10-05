<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoordenadorFixture
 *
 */
class CoordenadorFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'coordenador';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'professor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modalidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_coordenador_modalidade1_idx' => ['type' => 'index', 'columns' => ['modalidade_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['professor_id'], 'length' => []],
            'fk_coordenador_modalidade1' => ['type' => 'foreign', 'columns' => ['modalidade_id'], 'references' => ['modalidade', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_coordenador_professor1' => ['type' => 'foreign', 'columns' => ['professor_id'], 'references' => ['professor', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'professor_id' => 1,
            'modalidade_id' => 1
        ],
    ];
}
