<div class="panel panel-default">
  <div class="panel-heading">Faltas por turma</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Turma</th>
            <th>Quantidade</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($turma as $turma): ?>
        <tr>
            <td><?= h($turma->calendario->turma->nome) ?></td>
            <td><?= h($turma->qt) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Detalhe'), ['action' => 'viewFaltas', $turma->calendario->turma->id]) ?>                
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
