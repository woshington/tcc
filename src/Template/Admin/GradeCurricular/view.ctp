<?=$this->element('menuLateral')?>
<div class="gradeCurricular view large-10 medium-9 columns">
    <h2><?= h($gradeCurricular->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Disciplina') ?></h6>
            <p><?= $gradeCurricular->has('disciplina') ? $this->Html->link($gradeCurricular->disciplina->id, ['controller' => 'Disciplina', 'action' => 'view', $gradeCurricular->disciplina->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Professor') ?></h6>
            <p><?= $gradeCurricular->has('professor') ? $this->Html->link($gradeCurricular->professor->id, ['controller' => 'Professor', 'action' => 'view', $gradeCurricular->professor->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($gradeCurricular->id) ?></p>
            <h6 class="subheader"><?= __('Carga Horaria') ?></h6>
            <p><?= $this->Number->format($gradeCurricular->carga_horaria) ?></p>
            <h6 class="subheader"><?= __('Turma Id') ?></h6>
            <p><?= $this->Number->format($gradeCurricular->turma_id) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Obrigatorio') ?></h6>
            <p><?= $gradeCurricular->obrigatorio ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
