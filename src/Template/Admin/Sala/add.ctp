<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Sala</div>
  <div class="panel-body">
    <?= $this->Form->create($sala) ?>
  <div class="form-group">
        <?=$this->Form->input('nome', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
	</div>
</div>