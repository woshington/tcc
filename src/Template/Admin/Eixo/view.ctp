<?=$this->element('menuLateral')?>
<div class="eixo view large-10 medium-9 columns">
    <h2><?= h($eixo->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Descricao') ?></h6>
            <p><?= h($eixo->descricao) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($eixo->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Professor') ?></h4>
    <?php if (!empty($eixo->professor)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Coordenador') ?></th>
            <th><?= __('Usuario Id') ?></th>
            <th><?= __('Eixo Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($eixo->professor as $professor): ?>
        <tr>
            <td><?= h($professor->id) ?></td>
            <td><?= h($professor->coordenador) ?></td>
            <td><?= h($professor->usuario_id) ?></td>
            <td><?= h($professor->eixo_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Professor', 'action' => 'view', $professor->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Professor', 'action' => 'edit', $professor->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Professor', 'action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
