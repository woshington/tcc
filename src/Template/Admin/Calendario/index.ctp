<div class="panel panel-default">
  <div class="panel-heading">Listagem de Turmas</div>
  <div class="panel-body">
    <table class="table table-striped" >
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('ano') ?></th>
            <th><?= $this->Paginator->sort('turno') ?></th>
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
            <td>
                <?= $turma->has('curso') ? $this->Html->link($turma->curso->sigla, ['controller' => 'Curso', 'action' => 'view', $turma->curso->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhe'), ['action' => 'calendario', $turma->id]) ?>
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
