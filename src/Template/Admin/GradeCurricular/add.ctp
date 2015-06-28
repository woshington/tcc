<?=$this->element('menuLateral')?>
<div class="gradeCurricular form large-10 medium-9 columns">
    <?= $this->Form->create($gradeCurricular) ?>
    <fieldset>
        <legend><?= __('Add Grade Curricular') ?></legend>
        <?php
            echo $this->Form->input('carga_horaria');
            echo $this->Form->input('obrigatorio');
            echo $this->Form->input('disciplina_id', ['options' => $disciplina]);
            echo $this->Form->input('professor_id', ['options' => $professores]);
            echo $this->Form->input('turma_id', ['options' => $turma]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
