<div class="panel panel-default">
  <div class="panel-heading">Listagem de Usuarios</div>
  <div class="panel-body">
    <table class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>            
            <th><?= $this->Paginator->sort('tipo') ?></th>            
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usuario as $usuario): ?>
        <tr>
            <td><?= h($usuario->nome) ?></td>
            <td><?= h($usuario->email) ?></td>            
            <?php if($usuario->administrador):?>
            <td>Administrador</td>            
            <td class="actions">
            <?= $this->Html->link(__('View'), ['prefix'=>'admin', 'controller'=>'administrador', 'action' => 'view', $usuario->administrador[0]->id]) ?>
                <?= $this->Html->link(__('Edit'), ['prefix'=>'admin', 'controller'=>'administrador', 'action' => 'edit', $usuario->administrador[0]->id]) ?>
            </td>
        <?php else:?>
            <td>Professor</td>            
            <td class="actions">
            <?= $this->Html->link(__('View'), ['prefix'=>'admin', 'controller'=>'professor', 'action' => 'view', $usuario->professor[0]->id]) ?>
                <?= $this->Html->link(__('Edit'), ['prefix'=>'admin', 'controller'=>'professor', 'action' => 'edit', $usuario->professor[0]->id]) ?>
            </td>
        <?php endif;?>
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
