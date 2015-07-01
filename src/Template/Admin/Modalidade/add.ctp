<div class="panel panel-default">
  <div class="panel-heading">Cadastro de modalidade</div>
  <div class="panel-body">
    <?= $this->Form->create($modalidade) ?>
    <div class="form-group">
        <?=$this->Form->input('descricao', ['div'=>false, 'class'=>'form-control', 'label'=>'Descrição']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('tempoAula', ['options'=>$CHs, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
  </div>
    <?= $this->Form->end() ?>
  </div>
</div>
<div class="modalidade form large-10 medium-9 columns">
    
</div>
