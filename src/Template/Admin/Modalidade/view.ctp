<?=$this->element('menuLateral')?>
<div class="modalidade view large-10 medium-9 columns">
    <h2><?= h($modalidade->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Descricao') ?></h6>
            <p><?= h($modalidade->descricao) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($modalidade->id) ?></p>
            <h6 class="subheader"><?= __('Hora/Aula') ?></h6>
            <p><?= $CHs[$modalidade->tempoAula] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="modalidade view large-10 medium-9 columns">
            <p><?=$this->Html->link(__('Editar'), ['action'=>'edit', $modalidade->id])?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Curso') ?></h4>
    <?php if (!empty($modalidade->curso)): ?>
    <table cellpadding="0" cellspacing="0">
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
    <?php endif; ?>
    </div>
</div>
