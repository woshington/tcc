<?=$this->element('menuLateral')?>
<div class="sala view large-10 medium-9 columns">
    <h2><?= h($sala->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($sala->nome) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($sala->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Turma') ?></h4>
    <?php if (!empty($sala->turma)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Nome') ?></th>
            <th><?= __('Ano') ?></th>
            <th><?= __('Turno') ?></th>
            <th><?= __('Ativo') ?></th>
            <th><?= __('Curso Id') ?></th>
            <th><?= __('Sala Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($sala->turma as $turma): ?>
        <tr>
            <td><?= h($turma->id) ?></td>
            <td><?= h($turma->nome) ?></td>
            <td><?= h($turma->ano) ?></td>
            <td><?= h($turma->turno) ?></td>
            <td><?= h($turma->ativo) ?></td>
            <td><?= h($turma->curso_id) ?></td>
            <td><?= h($turma->sala_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Turma', 'action' => 'view', $turma->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Turma', 'action' => 'edit', $turma->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Turma', 'action' => 'delete', $turma->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turma->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
