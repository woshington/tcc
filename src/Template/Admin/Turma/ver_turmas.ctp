<?=$this->element('menuLateral')?>
<div class="turma index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
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
                <?= $this->Html->link(__('View'), ['action' => 'view', $turma->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turma->id]) ?>
                <?= $this->Html->link(__('Grade'), ['controller'=>'gradeCurricular', 'action' => 'verGrade', $turma->id]) ?>
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
