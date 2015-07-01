<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3><?=$sala->nome?> </h3>
    </div>
    <div class="panel-footer"><?=$this->Html->link('Editar', ['action'=>'edit', $sala->id])?></div>
</div>
    <?php if (!empty($sala->turma)): ?>
<div class="panel panel-default">
  <div class="panel-heading">Turmas relacionadas</div>
  <div class="panel-body">
    <table class="table table-striped">
        <tr>
            <th><?= __('Nome') ?></th>
            <th><?= __('Ano') ?></th>
            <th><?= __('Turno') ?></th>
            <th><?= __('Ativo') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($sala->turma as $turma): ?>
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
