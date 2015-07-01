<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Disciplinas</div>
  <div class="panel-body">
    <?= $this->Form->create($disciplina) ?>
    <div class="form-group">
        <?=$this->Form->input('nome', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
</div>
</div>