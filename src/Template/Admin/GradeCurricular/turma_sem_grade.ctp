<div class="panel panel-default">
  <div class="panel-heading">Listagem de Turmas</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ano</th>
            <th>Turno</th>
            <th>Curso</th>
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
                <?= $this->Html->link(__('Detalhe'), ['action' => 'verGrade', $turma->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
