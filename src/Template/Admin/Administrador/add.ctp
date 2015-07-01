<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Administradores</div>
  <div class="panel-body">
    <?= $this->Form->create($administrador) ?>
    <div class="form-group">
        <?=$this->Form->input('usuario.nome', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('usuario.email', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->password('usuario.senha', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('usuario.matricula', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('usuario.ativo', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('cargo', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
        <?=$this->Form->input('setor', ['div'=>false, 'class'=>'form-control']);?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default">Salvar</button>    
    </div>
    <?= $this->Form->end() ?>
</div>
