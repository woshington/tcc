<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HorarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HorarioTable Test Case
 */
class HorarioTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.horario',
        'app.grade_curricular',
        'app.disciplina',
        'app.professor',
        'app.usuario',
        'app.administrador',
        'app.eixo',
        'app.turma',
        'app.curso',
        'app.modalidade',
        'app.sala'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Horario') ? [] : ['className' => 'App\Model\Table\HorarioTable'];
        $this->Horario = TableRegistry::get('Horario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Horario);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
