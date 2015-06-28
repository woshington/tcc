<?=$this->element('menuLateral');?>
<div class="disciplina form large-10 medium-9 columns">
    <?= $this->Form->create($disciplina) ?>
    <fieldset>
        <legend><?= __('Add Disciplina') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
