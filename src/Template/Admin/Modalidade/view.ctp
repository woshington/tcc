<div class="panel panel-primary">
    <div class="panel-heading">Detalhes</div>
    <div class="panel-body">
        <h3>Descrição: <?=$modalidade->descricao?> </h3>
        <h3><span class="label label-default"> <?=$modalidade->tempoAula." Minutos"?></span></h3>
    </div>
    <div class="panel-footer"><?=$this->Html->link('Editar', ['action'=>'edit', $modalidade->id])?></div>
</div>
<?php if (!empty($modalidade->curso)): ?>
<div class="panel panel-default">
    <div class="panel-heading">Cursos relacionados</div>
        <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th><?= __('Descricao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modalidade->curso as $curso): ?>
            <tr>
                <td><?= h($curso->descricao) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Curso', 'action' => 'view', $curso->id]) ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php endif; ?>
