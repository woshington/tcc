<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalendarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalendarioTable Test Case
 */
class CalendarioTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calendario',
        'app.turma',
        'app.curso',
        'app.modalidade',
        'app.sala',
        'app.grade_curricular',
        'app.disciplina',
        'app.aula',
        'app.professor',
        'app.usuario',
        'app.administrador',
        'app.eixo',
        'app.horario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Calendario') ? [] : ['className' => 'App\Model\Table\CalendarioTable'];
        $this->Calendario = TableRegistry::get('Calendario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calendario);

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

    /**
     * Test saveCalendario method
     *
     * @return void
     */
    public function testSaveCalendario()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
