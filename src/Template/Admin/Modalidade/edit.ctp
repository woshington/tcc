<?=$this->element('menuLateral')?>
<div class="modalidade form large-10 medium-9 columns">
    <?= $this->Form->create($modalidade) ?>
    <fieldset>
        <legend><?= __('Edit Modalidade') ?></legend>
        <?php
            echo $this->Form->input('descricao');
            echo $this->Form->input('tempoAula', ['options'=>$CHs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
