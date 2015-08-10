<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    protected $CHs = [50=>'50 Minutos', 60=>'60 Minutos'];    
    protected $turnos = ['M'=>'Manhã', 'T'=>'Tarde', 'N'=>'Noite', 'I'=>'Integral'];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [            
                'Form' => [
                    'userModel'=>'Usuario', 
                    'fields' => ['username' => 'email', 'password' => 'senha']
                ]
            ],
            'authError' => 'Acesso negado!',
            'loginAction' => [
                'controller' => 'usuario', 
                'action' => 'login',
                'prefix'=>false
            ],
            'logoutRedirect' => [
                'controller' => 'usuario',
                'action' => 'login',                
            ]
        ]);
    }

    public function beforeFilter(Event $event){
        $this->layout = 'bootstrap';
        
        $this->set('CHs', $this->CHs);
        $this->set('turnos', $this->turnos);
        $this->set('usuarioLogado', $this->Auth->user());
        $this->loadModel('Administrador');
        $this->loadModel('Professor');
    }

    public function isAuthorized($user = null)
    {
        $admin = $this->Administrador->find('all', [
            'conditions'=>['usuario_id'=>$user['id']]
        ])->first();
        $professor = $this->Professor->find('all', [
            'conditions'=>['usuario_id'=>$user['id']]
        ])->first();

        if (empty($this->request->params['prefix'])) {
            return true;
        }

        // Only admins can access admin functions
        
        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($admin);
        }
        if ($this->request->params['prefix'] === 'coordenador') {
            return $professor->coordenador;
        }
        return false;
    }
}
