<div class="panel panel-default">
  <div class="panel-heading">
    Grade da turma: <?=$turma->nome?>
    <?php 
        echo $this->Html->link(__('Editar'), ['action'=>'editarGrade', $turma->id], [
            'class'=>'btn btn-info'
        ]);
    ?>
  </div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('carga_horaria') ?></th>
            <th><?= $this->Paginator->sort('obrigatorio') ?></th>
            <th><?= $this->Paginator->sort('disciplina_id') ?></th>
            <th><?= $this->Paginator->sort('professor_id') ?></th>
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
                <?= $gradeCurricular->has('professor') ? $gradeCurricular->professor->usuarios->nome : '' ?>
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
