<div class="panel panel-default">
    <div class="panel-heading">Listagem de Salas</div>
        <div class="panel-body">
        <table class="table table-striped">

    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($sala as $sala): ?>
        <tr>
            <td><?= h($sala->nome) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $sala->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sala->id]) ?>
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
