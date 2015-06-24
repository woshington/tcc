<?=$this->element('menuLateral')?>
<div class="sala form large-10 medium-9 columns">
    <?= $this->Form->create($sala) ?>
    <fieldset>
        <legend><?= __('Edit Sala') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
