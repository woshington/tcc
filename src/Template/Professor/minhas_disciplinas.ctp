<script type="text/javascript">
    var randomnb = function(){ return Math.round(Math.random()*300)};
    $(function(){
        $('#modalGrafico').modal('hide');
        $('#modalGraficoRadar').modal('hide');
    });

    function exibirGrafico(aulas, ministradas){
        var options = [];
        var data = [
            {
                value: (aulas-ministradas),
                color:"#00BB55",
                highlight: "red",
                label: "Pendentes"
            },
            {
                value: ministradas,
                color: "#46BFBD",
                highlight: "#00115E",
                label: "Ministradas"
            },            
        ]

        var ctx = $("#myChart").get(0).getContext("2d");
        var myDoughnutChart = new Chart(ctx).Doughnut(data,options);

        $('#modalGrafico').modal('show');         
    }

    function exibirGraficoDisciplinas(){
        var options = [];
        var $labels = [];
        var $carga_horaria = [];
        var $ministrada = [];
        $('#disciplinasTable').find('tr').each(function(key, val){
            $labels[key] = $(this).find('td').eq(0).text();
            $carga_horaria[key] = $(this).find('td').eq(2).text();
            $ministrada[key] = $(this).find('td').eq(3).text();
        });
        //console.log(labels);
        var data = {
            labels: $labels,
            datasets: [
                {
                    label: "Carga Horária",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: $carga_horaria
                },
                {
                    label: "Ministrada",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [6, 0]
                }
            ]
        };            
    
        var ctx = $("#myChartRadar").get(0).getContext("2d");
        var RadarChart = new Chart(ctx).Radar(data, options);

        $('#modalGraficoRadar').modal('show');
    }
</script>
<div class="panel panel-default">
  <div class="panel-heading">Minhas disciplinas</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= h('Disciplina'); ?></th>
            <th><?= h('Turma'); ?></th>
            <th><?= h('Carga (Aulas)'); ?></th>
            <th><?= h('Ministrada (Aulas)'); ?></th>
            <th class="actions"><?= __('Ações')?></th>
        </tr>
    </thead>
    <tbody id="disciplinasTable">
    <?php foreach ($disciplinas as $grade): ?>
    	<tr>
            <?php 
                $totalAulas = ($grade->carga_horaria*60)/$grade->turma->curso->modalidade->tempoAula;
                $ministrada = $grade->ministrada['qt'] > 0 ?  $grade->ministrada['qt'] : 0 ;
            ?>
    		<td><?=$grade->disciplina->nome?></td>
    		<td><?=$grade->turma->nome."/".$grade->turma->curso->sigla?></td>
    		<td><?=$totalAulas?></td>
    		<td><?=$ministrada ?></td>
            <td>
                <a href="#" onclick="exibirGrafico(<?=$totalAulas?>, <?=$ministrada?>);">
                    <span class="glyphicon glyphicon-tasks"></span> 
                </a>
            </td>
    	</tr>
    <?php endforeach ?>
    </tbody>
    </table>
</div>
<div class="panel-foot">
    <a href="#" onclick="exibirGraficoDisciplinas();">
        <?=$this->Html->image('grafico.jpg', ['style'=>'width:50px;'])?>
    </a>
</div>

<div class="modal fade" id="modalGrafico" tabindex="-1" role="dialog" aria-labelledby="Modal Grafico">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalDisciplinaLabel">Situação da disciplina</h4>
        </div>
        <div class="modal-body">
             <div style="width:400px;" class="chartDiv">
                <canvas id="myChart"></canvas>
              </div>
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="modalGraficoRadar" tabindex="-1" role="dialog" aria-labelledby="Modal Grafico">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalDisciplinasLabel">Minhas Disciplinas</h4>
        </div>
        <div class="modal-body">
             <div style="width:800px;" class="chartDiv">
                <canvas id="myChartRadar"></canvas>
              </div>
        </div>
    </div>
    </div>
</div>