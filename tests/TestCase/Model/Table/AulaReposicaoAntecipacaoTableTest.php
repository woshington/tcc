<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AulaReposicaoAntecipacaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AulaReposicaoAntecipacaoTable Test Case
 */
class AulaReposicaoAntecipacaoTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aula_reposicao_antecipacao',
        'app.reposicao_antecipacao',
        'app.aula',
        'app.disciplina',
        'app.grade_curricular',
        'app.professor',
        'app.usuario',
        'app.administrador',
        'app.eixo',
        'app.curso',
        'app.modalidade',
        'app.coordenador',
        'app.turma',
        'app.sala',
        'app.calendario',
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
        $config = TableRegistry::exists('AulaReposicaoAntecipacao') ? [] : ['className' => 'App\Model\Table\AulaReposicaoAntecipacaoTable'];
        $this->AulaReposicaoAntecipacao = TableRegistry::get('AulaReposicaoAntecipacao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AulaReposicaoAntecipacao);

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
