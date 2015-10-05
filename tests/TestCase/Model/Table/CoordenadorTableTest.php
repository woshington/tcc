<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoordenadorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoordenadorTable Test Case
 */
class CoordenadorTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coordenador',
        'app.professor',
        'app.usuario',
        'app.administrador',
        'app.eixo',
        'app.grade_curricular',
        'app.disciplina',
        'app.aula',
        'app.calendario',
        'app.turma',
        'app.curso',
        'app.modalidade',
        'app.sala',
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
        $config = TableRegistry::exists('Coordenador') ? [] : ['className' => 'App\Model\Table\CoordenadorTable'];
        $this->Coordenador = TableRegistry::get('Coordenador', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coordenador);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
