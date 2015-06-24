<?=$this->element('menuLateral')?>
<div class="Usuario form large-10 medium-9 columns">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Edit Administrador') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('senha', ['type'=>'password', 'value'=>'']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
