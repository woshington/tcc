<?=$this->element('menuLateral')?>
<div class="turma form large-10 medium-9 columns">
    <?= $this->Form->create($turma) ?>
    <fieldset>
        <legend><?= __('Edit Turma') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('ano');
            echo $this->Form->input('turno');
            echo $this->Form->input('ativo');
            echo $this->Form->input('curso_id', ['options' => $curso]);
            echo $this->Form->input('sala_id', ['options' => $sala]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
