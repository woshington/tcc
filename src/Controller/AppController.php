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
    protected $meses = [
        1=>'Janeiro', 2=>'Fevereiro', 3=>'Março', 4=>'Abril',
        5=>'Maio', 6=>'Junho', 7=>'Julho', 8=>'Agosto',
        9=>'Setembro', 10=>'Outubro', 11=>'Novembro', 12=>'Dezembro',
    ];

    protected $statusReposicao = [
        'A'=>'Aprovada', 
        'C'=>'Criada', 
        'R'=>'Rejeitada',
        'M'=>'Ministrada'
    ];

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
        $this->set('meses', $this->meses);
        $this->set('statusReposicao', $this->statusReposicao);
        $this->loadModel('Administrador');
        $this->loadModel('Professor');
        $this->loadModel('Usuario');
        $usuarioLogado = $this->Auth->user();
        $user = $this->Usuario->find()
            ->where(['Usuario.id'=>$usuarioLogado['id']])
            ->contain(['Professor'=>['Coordenador'], 'Administrador'])
            ->first();
        if(isset($usuarioLogado)){
            $usuarioLogado['coordenador'] = @$user->professor->coordenador;
            $usuarioLogado['professor'] = (bool) $user->professor;
        }        
        $this->set('usuarioLogado', $usuarioLogado);       
        
    }

    public function isAuthorized($user = null)
    {
        $admin = $this->Administrador->find('all', [
            'conditions'=>['usuario_id'=>$user['id']]
        ])->first();
        $professor = $this->Professor->find('all', [
            'contain'=>['Coordenador'],
            'conditions'=>['usuario_id'=>$user['id']]
        ])->first();
        if (empty($this->request->params['prefix'])) {
            return true;
        }
        if ($this->request->params['prefix'] === 'coordenador') {
            return (bool)(@$professor->coordenador->modalidade_id);
        }  
        // Only admins can access admin functions
        
        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($admin);
        }        
        return false;
    }
}
