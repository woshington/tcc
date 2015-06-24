<?=$this->element('menuLateral')?>
<div class="turma form large-10 medium-9 columns">
    <?= $this->Form->create($turma) ?>
    <fieldset>
        <legend><?= __('Add Turma') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('ano', ['options'=>$anos]);
            echo $this->Form->input('turno', ['options'=>$turnos]);
            echo $this->Form->input('curso_id', ['options' => $curso]);
            echo $this->Form->input('sala_id', ['options' => $sala]);
            echo $this->Form->input('ativo');            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
