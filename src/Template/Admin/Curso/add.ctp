<div class="panel panel-default">
  <div class="panel-heading">Cadastro de curso</div>
  <div class="panel-body">
    <?= $this->Form->create($curso) ?>
    <div class="form-group">
        <?=$this->Form->input('descricao', ['div'=>false, 'class'=>'form-control', 'label'=>'Descrição']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('sigla', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('modalidade_id', ['options'=>$modalidade, 'div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>    
   </div>
</div>
