<?=$this->element('menuLateral')?>
<div class="curso form large-10 medium-9 columns">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Edit Curso') ?></legend>
        <?php
            echo $this->Form->input('descricao');
            echo $this->Form->input('sigla');
            echo $this->Form->input('modalidade_id', ['options' => $modalidade]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
