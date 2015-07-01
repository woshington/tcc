<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Eixo</div>
  <div class="panel-body">
    <?= $this->Form->create($eixo) ?>
    <div class="form-group">
        <?=$this->Form->input('descricao', ['div'=>false, 'class'=>'form-control', 'label'=>'Descrição']);?>
    </div>
    
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
	</div>
</div>