<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AulaReposicaoAntecipacaoController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AulaReposicaoAntecipacaoController Test Case
 */
class AulaReposicaoAntecipacaoControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
