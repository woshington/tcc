<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AulaController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AulaController Test Case
 */
class AulaControllerTest extends IntegrationTestCase
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
