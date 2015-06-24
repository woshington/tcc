<?=$this->element('menuLateral')?>
<div class="modalidade index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('descrição') ?></th>
            <th><?= $this->Paginator->sort('Hora/aula') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($modalidade as $modalidade): ?>
        <tr>
            <td><?= h($modalidade->descricao) ?></td>
            <td><?= $CHs[$modalidade->tempoAula] ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $modalidade->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modalidade->id]) ?>
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
        <?=$this->Html->link('Nova', ['controller'=>'modalidade', 'action'=>'add'])?>
    </div>
</div>
