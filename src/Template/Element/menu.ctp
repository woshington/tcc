<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listagem <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Modalidades'), ['prefix'=>'admin', 'controller'=>'modalidade', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Cursos'), ['prefix'=>'admin', 'controller'=>'curso', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Salas'), ['prefix'=>'admin', 'controller'=>'sala', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Turmas'), ['prefix'=>'admin', 'controller'=>'turma', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Eixos'), ['prefix'=>'admin', 'controller'=>'eixo', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Disciplinas'), ['prefix'=>'admin', 'controller'=>'disciplina', 'action' => 'index']) ?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link(__('Usuarios'), ['prefix'=>'admin', 'controller'=>'usuario', 'action' => 'index']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?= $this->Html->link(__('Modalidades'), ['prefix'=>'admin', 'controller'=>'modalidade', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Cursos'), ['prefix'=>'admin', 'controller'=>'curso', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Salas'), ['prefix'=>'admin', 'controller'=>'sala', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Turmas'), ['prefix'=>'admin', 'controller'=>'turma', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Eixos'), ['prefix'=>'admin', 'controller'=>'eixo', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Disciplinas'), ['prefix'=>'admin', 'controller'=>'disciplina', 'action' => 'add']) ?></li>
            <li role="separator" class="divider"></li>
            <li><?= $this->Html->link(__('Usuarios'), ['prefix'=>false, 'controller'=>'usuario', 'action' => 'add']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grade <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?=$this->Html->link(__('Nova'), ['controller'=>'gradeCurricular', 'action' => 'add']) ?></li>            
            <li><?=$this->Html->link(__('Listar'), ['controller'=>'gradeCurricular', 'action' => 'index']) ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?=$this->Html->link(__('Turmas sem grade'), ['controller'=>'gradeCurricular', 'action' => 'turmaSemGrade']) ?></li>            
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