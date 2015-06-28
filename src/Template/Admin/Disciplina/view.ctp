<?=$this->element('menuLateral');?>
<div class="disciplina view large-10 medium-9 columns">
    <h2><?= h($disciplina->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($disciplina->nome) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($disciplina->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related GradeCurricular') ?></h4>
    <?php if (!empty($disciplina->grade_curricular)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Carga Horaria') ?></th>
            <th><?= __('Disciplina Id') ?></th>
            <th><?= __('Professor Id') ?></th>
            <th><?= __('Turma Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($disciplina->grade_curricular as $gradeCurricular): ?>
        <tr>
            <td><?= h($gradeCurricular->id) ?></td>
            <td><?= h($gradeCurricular->carga_horaria) ?></td>
            <td><?= h($gradeCurricular->disciplina_id) ?></td>
            <td><?= h($gradeCurricular->professor_id) ?></td>
            <td><?= h($gradeCurricular->turma_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'GradeCurricular', 'action' => 'view', $gradeCurricular->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'GradeCurricular', 'action' => 'edit', $gradeCurricular->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'GradeCurricular', 'action' => 'delete', $gradeCurricular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gradeCurricular->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
