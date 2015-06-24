<?=$this->element('menuLateral')?>
<div class="eixo form large-10 medium-9 columns">
    <?= $this->Form->create($eixo) ?>
    <fieldset>
        <legend><?= __('Add Eixo') ?></legend>
        <?php
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
