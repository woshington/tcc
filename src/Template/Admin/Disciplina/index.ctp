<div class="panel panel-default">
  <div class="panel-heading">Listagem de Disciplinas</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($disciplina as $disciplina): ?>
        <tr>
            <td><?= h($disciplina->nome) ?></td>
            <td class="actions">

                
                <?= $this->Html->link(__('View'), ['action' => 'view', $disciplina->id]) ?>
                
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $disciplina->id]) ?>
                <span class="glyphicon glyphicon-plus">
                    <?php 
                        echo  $this->Html->link(__('Grade'), [
                            'action' => 'edit', $disciplina->id
                        ],['class' => 'btn btn-primary']);
                    ?>
                </span>
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
