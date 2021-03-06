<div class="panel panel-default">
  <div class="panel-heading">Listagem de Turmas</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('ano') ?></th>
            <th><?= $this->Paginator->sort('turno') ?></th>
            <th><?= $this->Paginator->sort('ativo') ?></th>
            <th><?= $this->Paginator->sort('curso_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($turma as $turma): ?>
        <tr>
            <td><?= h($turma->nome) ?></td>
            <td><?= $turma->ano ?></td>
            <td><?= h($turnos[$turma->turno]) ?></td>
            <td><?= h($turma->ativo ? 'SIM' : 'NÃO') ?></td>
            <td>
                <?= $turma->has('curso') ? $this->Html->link($turma->curso->sigla, ['controller' => 'Curso', 'action' => 'view', $turma->curso->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $turma->id], ['class'=>'btn btn-primary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turma->id], ['class'=>'btn btn-primary']) ?>
                <?php if (!$turma->ativo): ?>
                    <?php echo $this->Form->postLink(__('Ativar'),['action' => 'ativar', $turma->id], ['confirm'=>'Deseja ativar essa turma?', 'class'=>'btn btn-success']);?>
                <?php else: ?>
                    <?php echo $this->Form->postLink(__('Desativar'),['action' => 'ativar', $turma->id, 0], ['confirm'=>'Deseja ativar essa turma?', 'class'=>'btn btn-danger']);?>
                <?php endif ?>               
                 
            </td>
        </tr>

    <?php endforeach; ?>
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
