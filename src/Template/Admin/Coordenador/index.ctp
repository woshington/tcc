<table class="table table-striped">
<thead>
    <tr>
        <th><?= $this->Paginator->sort('eixo') ?></th>
        <th><?= $this->Paginator->sort('modalidade') ?></th>
        <th><?= $this->Paginator->sort('professor') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<tbody>
<?php foreach ($coordenador as $coordenador): ?>
    <tr>
        <td>
            <?= $coordenador->has('professor') ? $this->Html->link($coordenador->professor->eixo->descricao, ['controller' => 'Eixo', 'action' => 'view', $coordenador->professor->eixo->id]) : '' ?>
        </td>
        <td>
            <?= $coordenador->has('modalidade') ? $this->Html->link($coordenador->modalidade->descricao, ['controller' => 'Modalidade', 'action' => 'view', $coordenador->modalidade->id]) : '' ?>
        </td>
        <td>
        <?=$coordenador->has('professor') ? h($coordenador->professor->usuario->nome) : '' ?>
        </td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $coordenador->professor_id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coordenador->professor_id]) ?>
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