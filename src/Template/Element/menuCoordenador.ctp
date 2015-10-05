<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listagem <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Professores'), ['prefix'=>'coordenador', 'controller'=>'professor', 'action' => 'index']) ?></li>            
            <li><?= $this->Html->link(__('Reposições'), ['prefix'=>'coordenador', 'controller'=>'ReposicaoAntecipacao', 'action' => 'index']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Professores'), ['prefix'=>'coordenador', 'controller'=>'professor', 'action' => 'add']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$usuarioLogado['nome']?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <?=$this->Html->link('Meu perfil', ['prefix'=>false, 'controller'=>'usuario', 'action'=>'view'])?>
            </li>            
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link(__('Sair'), ['prefix'=>false, 'controller'=>'usuario', 'action' => 'logout']) ?></li>            
          </ul>
        </li>
      </ul>
    </div>