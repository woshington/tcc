<script type="text/javascript">
    $(function(){
        $('#data').hide();
        $('#formAntecipacao').submit(function(){
            if($('#data').val()==''){
                alert('Escolha um dia no calendario!');
                return false;
            }
            if($("input:checkbox:checked").length<=0){
                alert('Marque ao menos uma aula!');
                return false;   
            }
        });        
    });
    function classe(objeto){
        $('button').attr('class', 'btn btn-danger');
        $(objeto).attr("class", 'btn btn-primary');
    }
    function diasLetivosController($scope, $http) {
        $scope.reposicao = {};
        $scope.change = function(){
            $scope.dias = [];
            $http.get("http://localhost/tcc/turma/getDiasLetivos/"+$scope.turmaSelecionada)
                 .success(function(response) {
                    $scope.dias = response.dias;
                 }
            );
        }
        $scope.aulasDoDia = function(data){
            $scope.dataMaxima = data;
            $http.get("http://localhost/tcc/aula/getAulas/"+data+"/"+$scope.turmaSelecionada)
                 .success(function(response) {
                    $scope.horario = response.horario;
                 }
            );
        }      
    }
</script>
<div class="panel panel-default" ng-app='calendarioApp'>
  <div class="panel-heading">Solicitar antecipação</div>
  <div class="panel-body" ng-controller="diasLetivosController">
  <?= $this->Form->create($reposicaoAntecipacao, ['id'=>'formAntecipacao']) ?>
    <div class="row">
        <div class="col-md-4">            
            <div class="form-group">
                <?=$this->Form->input('turma', ['div'=>false, 'class'=>'form-control','id'=>'turma', 'options'=>$turma, 'empty'=>'Escolha uma turma', 'ng-model'=>'turmaSelecionada', 'ng-change'=>'change()', 'required'])?>
            </div>            
        </div>    
        <div class="col-md-8" >            
            <div class="alert alert-warning">
                Dias letivos: 
                <span ng-repeat="dia in dias">
                    <button class="btn btn-danger" ng-click="aulasDoDia(dia.ano+'-'+dia.mes+'-'+dia.dia, this)" onclick="classe(this);">
                        {{ dia.dia }}/{{ dia.mes }} 
                    </button>                     
                </span>                
            </div>            
            <br />            
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <th>Aula</th>
            <th>Disciplina</th>
            <th>Antecipar?</th>
        </thead>
        <tbody id="aulasDia">
            <tr ng-repeat="h in horario">
                <td>{{ h.aula }}</td>
                <td>{{ h.grade_curricular.disciplina.nome }}</td>                
                <td>
                    <input type="checkbox" name="antecipar[]" value="{{ h.aula }}" class="clsAntecipar" />
                </td>                
            </tr>            
        </tbody>
    </table>
    <div class="row"> 
        <div class="col-md-4"> 
            <label for="dataReposicao">Data:</label>
            <input type="date" id="dataReposicao" name="dataReposicao" ng-model="dataReposicao" placeholder="yyyy-MM-dd" min="<?=date('Y-m-d')?>" max="{{ dataMaxima }}" class="form-control" required />
        </div>
        <div class="col-md-8"> 
        <label for="justificativa" >Justificativa:</label>
            <?=$this->Form->input('justificativa', ['class'=>'form-control', 'label'=>false])?>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-2">
            <input type="submit" value="Confirmar" class="btn btn-success" />
        </div>        
        <input type="text" name="data" id="data" class="form-control" value="{{ dataMaxima }}"/>        
    </div>
    <?=$this->Form->end()?>
  </div> 
</div>