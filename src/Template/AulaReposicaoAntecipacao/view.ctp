<div class="panel panel-default">
  <div class="panel-heading">Reposição</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?=h('Data falta')?></th>
            <th><?=h('Turma')?></th>
            <th><?=h('Aula')?></th>
            <th><?=h('Repor na')?></th>
            <th><?=h('status')?></th>            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($aulaReposicaoAntecipacao as $aula): ?>
        <tr>
            <td><?=$aula->aula->calendario->data?></td>
            <td><?=$aula->aula->calendario->turma->nome."/".$aula->aula->calendario->turma->curso->sigla?></td>
            <td><?=$aula->aula->aula?></td>
            <td><?=$aula->aula_repor?></td>
            <td><?=$aula->status?></td>
            
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>
</div>
