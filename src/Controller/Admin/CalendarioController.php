<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Aula Controller
 *
 * @property \App\Model\Table\AulaTable $Aula
 */
class CalendarioController extends AppController{
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Turma');
    }

    public function index()
    {        
        $this->paginate = [
            'conditions'=>['ativo'=>true],
            'contain'=>['Curso']

        ];
        $this->set('turma', $this->paginate($this->Turma));
        $this->set('_serialize', ['curso']);
    }


    public function calendario($turma_id, $mes = null, $ano = null){
        $turma = $this->Turma->get($turma_id);

        if(is_null($mes) or is_null($ano)){
            $mes = (int) date('m');
            $ano = date('Y');
        }elseif($mes==0){
            $mes = 12;
            $ano = $ano - 1;
        }elseif($mes==13){
            $mes = 1;
            $ano = $ano + 1;
        }    
        if($this->request->is('post')){
            $fieldCalendario = json_decode($this->request->data['fieldCalendar']);
            foreach ($fieldCalendario as $cal) {
                $calendario = $this->Calendario->newEntity();
                $calendario->data = mktime(0, 0, 0, $cal->mes, $cal->dia, $cal->ano);
                $calendario->turma_id = $turma_id;
                $calendario->letivo = $cal->letivo;
                $this->Calendario->saveCalendario($calendario);
            }            
        }
        $dataTime = mktime(0,0,0, $mes, 1, $ano);
        $first_day = getdate($dataTime);
        $last_day = date('t', $dataTime);
        $dataTimeLast = mktime(0,0,0, $mes, $last_day, $ano);

        
        $calendario_mensal = $this->Calendario->find()
        ->where([
            'data >='=>date('Y-m-d', $dataTime), 
            'data <='=>date('Y-m-d', $dataTimeLast),
            'turma_id'=>$turma_id
        ])->toArray();
        
        $cal_mes = array();
        
        foreach ($calendario_mensal as $data) {
            $cal_mes[(int) $data->data->i18nFormat('dd')] = $data->letivo;
        }
        
        $this->set('meses', $this->meses);
        $this->set(compact('mes','ano', 'first_day', 'last_day', 'turma', 'cal_mes'));
    }
}
