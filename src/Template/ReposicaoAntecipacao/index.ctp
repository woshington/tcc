<div class="panel panel-default">
  <div class="panel-heading">Listagem de reposições</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('numero') ?></th>
            <th><?= $this->Paginator->sort('data') ?></th>
            <th><?= $this->Paginator->sort('data reposição') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($reposicaoAntecipacao as $reposicaoAntecipacao): ?>
    	<tr>
    		<td><?=$reposicaoAntecipacao->id?></td>
    		<td><?=$reposicaoAntecipacao->created?></td>
    		<td><?=$reposicaoAntecipacao->dataReposicao?></td>
    		<td><?=$reposicaoAntecipacao->status?></td>
    		<td><?=$this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['controller'=>'AulaReposicaoAntecipacao', 'action'=>'view', $reposicaoAntecipacao->id], ['escape'=>false]);?></td>
    	</tr>
    <?php endforeach ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
