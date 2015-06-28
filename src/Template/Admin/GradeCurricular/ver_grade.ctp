<?=$this->element('menuLateral')?>
<div class="gradeCurricular index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('carga_horaria') ?></th>
            <th><?= $this->Paginator->sort('obrigatorio') ?></th>
            <th><?= $this->Paginator->sort('disciplina_id') ?></th>
            <th><?= $this->Paginator->sort('professor_id') ?></th>
            <th><?= $this->Paginator->sort('turma_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($gradeCurricular as $gradeCurricular): ?>
        <tr>
            <td><?= $this->Number->format($gradeCurricular->carga_horaria) ?></td>
            <td><?= h($gradeCurricular->obrigatorio ? 'Sim': 'Não') ?></td>
            <td>
                <?= $gradeCurricular->has('disciplina') ? $gradeCurricular->disciplina->nome : '' ?>
            </td>
            <td>
                <?= $gradeCurricular->has('professor') ? $gradeCurricular->professor->usuario->nome : '' ?>
            </td>
            <td><?= h($gradeCurricular->turma->nome) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $gradeCurricular->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gradeCurricular->id]) ?>
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
