<script type="text/javascript">
    var randomnb = function(){ return Math.round(Math.random()*300)};
    $(function(){
        $('#modalGrafico').modal('hide');
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
    <tbody>
    <?php foreach ($disciplinas as $grade): ?>
    	<tr>
            <?php $totalAulas = ($grade->carga_horaria*$grade->ministrada['tempoAula'])/60;?>
    		<td><?=$grade->disciplina->nome?></td>
    		<td><?=$grade->turma->nome?></td>
    		<td><?=$totalAulas?></td>
    		<td><?=$grade->ministrada['qt']?></td>
            <td>
                <a href="#" onclick="exibirGrafico(<?=$totalAulas?>, <?=$grade->ministrada['qt']?>);">
                    <span class="glyphicon glyphicon-tasks"></span> 
                </a>
            </td>
    	</tr>
    <?php endforeach ?>
    </tbody>
    </table>
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