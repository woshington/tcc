<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReposicaoAntecipacaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReposicaoAntecipacaoTable Test Case
 */
class ReposicaoAntecipacaoTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reposicao_antecipacao',
        'app.aula_reposicao_antecipacao',
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
        $config = TableRegistry::exists('ReposicaoAntecipacao') ? [] : ['className' => 'App\Model\Table\ReposicaoAntecipacaoTable'];
        $this->ReposicaoAntecipacao = TableRegistry::get('ReposicaoAntecipacao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReposicaoAntecipacao);

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
}
