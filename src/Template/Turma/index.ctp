<div class="panel panel-default">
  <div class="panel-heading">Turmas</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($grade as $grade): ?>
        <tr>
            <td><?= h($grade->turma->nome) ?></td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
