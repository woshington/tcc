<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GradeCurricularTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GradeCurricularTable Test Case
 */
class GradeCurricularTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('GradeCurricular') ? [] : ['className' => 'App\Model\Table\GradeCurricularTable'];
        $this->GradeCurricular = TableRegistry::get('GradeCurricular', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GradeCurricular);

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
     * Test unico method
     *
     * @return void
     */
    public function testUnico()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
