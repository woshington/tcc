<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AulaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AulaTable Test Case
 */
class AulaTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aula',
        'app.disciplina',
        'app.grade_curricular',
        'app.professor',
        'app.usuario',
        'app.administrador',
        'app.eixo',
        'app.turma',
        'app.curso',
        'app.modalidade',
        'app.sala',
        'app.horario',
        'app.calendario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Aula') ? [] : ['className' => 'App\Model\Table\AulaTable'];
        $this->Aula = TableRegistry::get('Aula', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aula);

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
