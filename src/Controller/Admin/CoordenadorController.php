<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Coordenador Controller
 *
 * @property \App\Model\Table\CoordenadorTable $Coordenador
 */
class CoordenadorController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modalidade', 'Professor'=>['Eixo', 'Usuario']],

        ];
        $this->set('coordenador', $this->paginate($this->Coordenador));
        $this->set('_serialize', ['coordenador']);
    }

    /**
     * View method
     *
     * @param string|null $id Coordenador id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coordenador = $this->Coordenador->get($id, [
            'contain' => ['Modalidade', 'Professor']
        ]);
        $this->set('coordenador', $coordenador);
        $this->set('_serialize', ['coordenador']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Eixo');
        $coordenador = $this->Coordenador->newEntity();
        if ($this->request->is('post')) {
            $coordenador = $this->Coordenador->patchEntity($coordenador, $this->request->data);

            if ($this->Coordenador->save($coordenador)) {
                $this->Flash->success(__('The coordenador has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coordenador could not be saved. Please, try again.'));
            }
        }
        $modalidade = $this->Coordenador->Modalidade->find('list', ['limit' => 200]);
        $eixo = $this->Eixo->find('list', ['limit' => 200]);
        $this->set(compact('coordenador', 'modalidade', 'eixo'));
        $this->set('_serialize', ['coordenador']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coordenador id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coordenador = $this->Coordenador->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coordenador = $this->Coordenador->patchEntity($coordenador, $this->request->data);
            if ($this->Coordenador->save($coordenador)) {
                $this->Flash->success(__('The coordenador has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coordenador could not be saved. Please, try again.'));
            }
        }
        $modalidade = $this->Coordenador->Modalidade->find('list', ['limit' => 200]);
        $this->set(compact('coordenador', 'modalidade'));
        $this->set('_serialize', ['coordenador']);
    }
}
