<div class="panel panel-default">
  <div class="panel-heading">Listagem de Professores</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('coordenador') ?></th>
            <th><?= $this->Paginator->sort('usuario_id') ?></th>
            <th><?= $this->Paginator->sort('eixo_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($professor as $professor): ?>
        <tr>
            <td><?= h($professor->coordenador ? 'SIM' : "NãO") ?></td>
            <td>
                <?= $professor->has('usuario') ? $professor->usuario->nome : '' ?>
            </td>
            <td>
                <?= $professor->has('eixo') ? $professor->eixo->descricao : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $professor->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->id]) ?>
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
