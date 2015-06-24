<?=$this->element('menuLateral')?>
<div class="curso index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('descrição') ?></th>
            <th><?= $this->Paginator->sort('sigla') ?></th>
            <th><?= $this->Paginator->sort('modalidade_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($curso as $curso): ?>
        <tr>
            <td><?= h($curso->descricao) ?></td>
            <td><?= h($curso->sigla) ?></td>
            <td>
                <?= $curso->has('modalidade') ? $this->Html->link($curso->modalidade->descricao, ['controller' => 'Modalidade', 'action' => 'view', $curso->modalidade->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $curso->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $curso->id]) ?>
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
