<?=$this->element('menuLateral')?>
<div class="eixo index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('descricao') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($eixo as $eixo): ?>
        <tr>
            <td><?= h($eixo->descricao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $eixo->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eixo->id]) ?>
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
