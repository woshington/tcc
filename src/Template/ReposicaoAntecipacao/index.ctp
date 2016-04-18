<div class="panel panel-default">
  <div class="panel-heading">Listagem de reposições</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>numero</th>
            <th>data</th>
            <th>data reposição</th>
            <th>status</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reposicaoAntecipacao as $reposicaoAntecipacao): ?>
        <tr>        
    		<td><?=$reposicaoAntecipacao['id']?></td>
    		<td><?=$reposicaoAntecipacao['created']?></td>
    		<td><?=$reposicaoAntecipacao['dataReposicao']?></td>
    		<td><?=$reposicaoAntecipacao['status']?></td>
    		<td><?=$this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['controller'=>'AulaReposicaoAntecipacao', 'action'=>'view', $reposicaoAntecipacao['id']], ['escape'=>false]);?></td>
    	</tr>
    <?php endforeach ?>
    </tbody>
    </table>
</div>
