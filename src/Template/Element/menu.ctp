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
            <li><?= $this->Html->link(__('Coordenador'), ['prefix'=>'admin', 'controller'=>'coordenador', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Professor'), ['prefix'=>'admin', 'controller'=>'professor', 'action' => 'index']) ?></li>
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
            <li><?= $this->Html->link(__('Coordenador'), ['prefix'=>'admin', 'controller'=>'coordenador', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Professor'), ['prefix'=>'admin', 'controller'=>'professor', 'action' => 'add']) ?></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grade <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?=$this->Html->link(__('Nova'), ['prefix'=>'admin', 'controller'=>'gradeCurricular', 'action' => 'add']) ?></li>            
            <li><?=$this->Html->link(__('Listar'), ['prefix'=>'admin', 'controller'=>'gradeCurricular', 'action' => 'index']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Horario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?=$this->Html->link(__('Listar'), ['prefix'=>'admin','controller'=>'horario', 'action' => 'index']) ?></li>            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><?=$this->Html->link(__('Calendario'), ['prefix'=>'admin','controller'=>'calendario', 'action' => 'index']) ?></li>
            <li><?=$this->Html->link(__('Aula'), ['prefix'=>'admin','controller'=>'aula', 'action' => 'index']) ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?=$this->Html->link(__('Turmas sem grade'), ['controller'=>'gradeCurricular', 'action' => 'turmaSemGrade']) ?></li>            
            <li><?=$this->Html->link(__('Faltas por turma'), ['controller'=>'aula', 'action' => 'faltaTurma']) ?></li>            
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