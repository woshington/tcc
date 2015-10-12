<script type="text/javascript">
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
        $scope.salvarForm = function(reposicao_antecipacao){
            console.log(reposicao_antecipacao);
            $scope.reposicao = angular.copy(reposicao_antecipacao);
        }
    }
</script>
<div class="panel panel-default" ng-app='calendarioApp'>
  <div class="panel-heading">Solicitar antecipação</div>
  <div class="panel-body" ng-controller="diasLetivosController">
    <div class="row">
        <div class="col-md-4">
            <?= $this->Form->create() ?>
            <div class="form-group">
                <?=$this->Form->input('turma', ['div'=>false, 'class'=>'form-control','id'=>'turma', 'options'=>$turma, 'ng-model'=>'turmaSelecionada', 'ng-change'=>'change()'])?>
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
    <?=$this->Form->end()?>
    <table class="table table-striped">
        <thead>
            <th>Aula</th>
            <th>Disciplina</th>
            <th>Antecipar?</th>
        </thead>
        <tbody>
            <tr ng-repeat="h in horario">
                <td>{{ h.aula }}</td>
                <td>{{ h.grade_curricular.disciplina.nome }}</td>
                <td><input type="checkbox" checked="checked"></td>
            </tr>            
        </tbody>
    </table>
    <div class="row"> 
        <div class="col-md-4"> 
            <label for="dataReposicao">Data:</label>
            <input type="date" id="dataReposicao" ng-model="reposicao_antecipacao.dataReposicao" placeholder="yyyy-MM-dd" min="<?=date('Y-m-d')?>" max="{{ dataMaxima }}" class="form-control" required />
        </div>
        <div class="col-md-8"> 
            <label for="justificativa">Justificativa:</label>
            <textarea id="justificativa" ng-model="reposicao_antecipacao.justificativa"class="form-control"></textarea>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-2">
            <a href="#" class="btn btn-success" ng-click="salvarForm(reposicao_antecipacao)">
                <span class="glyphicon glyphicon-ok"> Confirmar</span>
            </a>            
        </div>
        <div class="col-md-1">
            <a href="#" class="btn btn-default">
                <span class="glyphicon glyphicon-remove"> Cancelar</span>
            </a>
        </div>
    </div>
  </div>
  <pre>reposicao = {{reposicao | json}}</pre>
</div>