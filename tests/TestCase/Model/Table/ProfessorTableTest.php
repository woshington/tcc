<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessorTable Test Case
 */
class ProfessorTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.professor',
        'app.usuario',
        'app.administrador',
        'app.eixo',
        'app.grade_curricular',
        'app.disciplina',
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
        $config = TableRegistry::exists('Professor') ? [] : ['className' => 'App\Model\Table\ProfessorTable'];
        $this->Professor = TableRegistry::get('Professor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Professor);

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
