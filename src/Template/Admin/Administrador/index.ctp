<?=$this->element('menuLateral')?>
<div class="administrador index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('cargo') ?></th>
            <th><?= $this->Paginator->sort('setor') ?></th>
            <th><?= $this->Paginator->sort('usuario_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($administrador as $administrador): ?>
        <tr>
            <td><?= h($administrador->cargo) ?></td>
            <td><?= h($administrador->setor) ?></td>
            <td>
                <?= $administrador->has('usuario') ? h(strtoupper($administrador->usuario->nome)) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $administrador->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrador->id]) ?>
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
