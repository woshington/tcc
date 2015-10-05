<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AulaReposicaoAntecipacaoFixture
 *
 */
class AulaReposicaoAntecipacaoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'aula_reposicao_antecipacao';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'aula' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reposicao_antecipacao_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'aula_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_table1_reposicao_antecipacao1_idx' => ['type' => 'index', 'columns' => ['reposicao_antecipacao_id'], 'length' => []],
            'fk_aula_reposicao_antecipacao_aula1_idx' => ['type' => 'index', 'columns' => ['aula_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_aula_reposicao_antecipacao_aula1' => ['type' => 'foreign', 'columns' => ['aula_id'], 'references' => ['aula', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_table1_reposicao_antecipacao1' => ['type' => 'foreign', 'columns' => ['reposicao_antecipacao_id'], 'references' => ['reposicao_antecipacao', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'aula' => 1,
            'reposicao_antecipacao_id' => 1,
            'aula_id' => 1
        ],
    ];
}
