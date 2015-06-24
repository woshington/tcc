<?=$this->element('menuLateral')?>
<div class="curso view large-10 medium-9 columns">
    <h2><?= h($curso->sigla) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Descricao') ?></h6>
            <p><?= h($curso->descricao) ?></p>
            <h6 class="subheader"><?= __('Modalidade') ?></h6>
            <p><?= $curso->has('modalidade') ? $this->Html->link($curso->modalidade->descricao, ['controller' => 'Modalidade', 'action' => 'view', $curso->modalidade->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($curso->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Turma') ?></h4>
    <?php if (!empty($curso->turma)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Nome') ?></th>
            <th><?= __('Ano') ?></th>
            <th><?= __('Turno') ?></th>
            <th><?= __('Ativo') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($curso->turma as $turma): ?>
        <tr>
            <td><?= h($turma->nome) ?></td>
            <td><?= h($turma->ano) ?></td>
            <td><?= h($turnos[$turma->turno]) ?></td>
            <td><?= h($turma->ativo) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Turma', 'action' => 'view', $turma->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Turma', 'action' => 'edit', $turma->id]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
