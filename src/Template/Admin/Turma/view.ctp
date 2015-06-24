<?=$this->element('menuLateral')?>
<div class="turma view large-10 medium-9 columns">
    <h2><?= h($turma->nome) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Turno') ?></h6>
            <p><?= h($turnos[$turma->turno]) ?></p>
            <h6 class="subheader"><?= __('Curso') ?></h6>
            <p><?= $turma->has('curso') ? $this->Html->link($turma->curso->sigla, ['controller' => 'Curso', 'action' => 'view', $turma->curso->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Sala') ?></h6>
            <p><?= $turma->has('sala') ? $this->Html->link($turma->sala->nome, ['controller' => 'Sala', 'action' => 'view', $turma->sala->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($turma->id) ?></p>
            <h6 class="subheader"><?= __('Ano') ?></h6>
            <p><?= $turma->ano ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Ativo') ?></h6>
            <p><?= $turma->ativo ? __('Sim') : __('Não'); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="large-5 columns strings">
            <?=$this->Html->link(__('Editar'), ['action'=>'edit', $turma->id])?>
        </div>
    </div>
</div>
