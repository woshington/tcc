<?=$this->element('menuLateral')?>
<div class="sala index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
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
