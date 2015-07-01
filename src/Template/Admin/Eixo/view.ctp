<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3>Descrição: <?=$eixo->descricao?> </h3>        
    </div>
    <div class="panel-footer"><?=$this->Html->link('Editar', ['action'=>'edit', $eixo->id])?></div>
</div>
    <?php if (!empty($eixo->professor)): ?>
    <div class="panel panel-default">
    <div class="panel-heading">Professores relacionados</div>
        <div class="panel-body">
        <table class="table table-striped">
        <tr>
            <th><?= __('Coordenador') ?></th>
            <th><?= __('Usuario Id') ?></th>
            <th><?= __('Eixo Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($eixo->professor as $professor): ?>
        <tr>
            <td><?= h($professor->coordenador ? 'Sim' : 'Não') ?></td>
            <td><?= h($professor->usuario_id) ?></td>
            <td><?= h($professor->eixo_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Professor', 'action' => 'view', $professor->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Professor', 'action' => 'edit', $professor->id]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
