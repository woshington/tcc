<script type="text/javascript">
    $(function(){        
        $('#formGrade').submit(function(){
            $('#modalDisciplina').modal('hide');
            var dados = $("#formGrade").serialize();
            if($('#id').val()==""){
                $.ajax({
                  url: "../save",
                  data: dados,
                  type: "post",
                  success: function(data){                    
                    if(data){
                        alert('salvo com sucesso');
                        refreshList();
                    }else{
                        alert('Error!');
                    }
                  },
                });
            }else{
                $.ajax({
                  url: "../edit",
                  data: dados,
                  type: "post",
                  success: function(data){                    
                    if(data){
                        alert('salvo com sucesso');
                        refreshList();
                    }else{
                        alert('Error!');
                    }                
                  },
                });
            }            
            return false;
        });
        $('#btnNewDisciplina').click(function(){
            var turma = $('#turma-id').val();
            $(':input','#formGrade').val('')
            $('#turma-id').val(turma);
            $('#modalDisciplina').modal('show');
        });
    });

    function excluir(handler, id){ 
        if(confirm('Deseja realmente excluir essa linha?')){             
            $.ajax({
                type: 'GET',
                url: '../deleteGrade/'+id,
                success: function(retorno){
                    if(retorno==true){
                        var tr = $(handler).closest('tr');
                        tr.remove(); 
                    }else{
                        alert('Impossivel excluir!');                        
                    }                    
                } 
            });            
        };
    };

    function editar(gradeCurricularId){
        $.getJSON('../getGrade/'+gradeCurricularId, function( grade ) {
            $('#id').val(grade.id);
            $('#disciplina_id').val(grade.disciplina_id);
            $('#cargaHoraria').val(grade.carga_horaria);
            $('#professor_id').val(grade.professor_id);
            if(grade.obrigatorio){
                $('#obrigatorio').attr('checked', true);
            }            
            $('#modalDisciplina').modal();
        });
    }
    function refreshList(){
        $("#grade > tr").remove();
        $.getJSON('../getGradeTurma/'+<?=$turma->id?>, function( grade ) {
            var gradeTurma = $('#grade');
            $.each(grade, function(i, item){
                var obrigatorio = item.obrigatorio ? 'SIM' : 'NAO';
                
                var linkRemove = "<a href = '#' class='btn btn-primary' onClick=remove(this, "+item.id+");><span class='glyphicon glyphicon-remove'> Excluir</span></a>";
                var linkEditar = "<a href = '#' class='btn btn-primary' onClick=editar("+item.id+");><span class='glyphicon glyphicon-edit'> Editar</span></a>";
                   
                gradeTurma.append('<tr><td>'+item.disciplina+'</td><td>'+item.carga_horaria+'</td><td>'+item.professor+'</td><td>'+obrigatorio+'</td><td>'+linkRemove+" "+linkEditar+'</td></tr>');
                
            });
        });
    }
</script>
<div class="panel panel-default">
  <div class="panel-heading">Grade curricular: <?=$turma->nome?> / <?=$turma->ano?></div>
  <div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Carga Horária</th>
                <th>Professor</th>
                <th>Obrigatória</th>
                <th><?=__('Actions')?></th>
            </tr>
        </thead>
        <tbody class='grade' id="grade">
        <?php foreach ($grade as $key=>$gradeCurricular): ?>
            <tr>
                <td>
                    <?= $gradeCurricular->disciplina->nome?>
                </td>
                <td>
                    <?= $gradeCurricular->carga_horaria?>
                </td>
                <td>
                    <?= $gradeCurricular->professor->usuarios->nome?>
                </td>
                <td>
                    <?=$gradeCurricular->obrigatorio ? 'SIM' : 'NAO' ?>
                </td>
                <td>
                    <a href="#" class="btn btn-primary" onclick="excluir(this, <?=$gradeCurricular->id?>);">
                        <span class="glyphicon glyphicon-remove"> Excluir</span> 
                    </a>
                    <a href="#" class="btn btn-primary" onclick="editar(<?=$gradeCurricular->id?>);">
                        <span class="glyphicon glyphicon-edit"> Editar</span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>        
    </table>
    <a href="#" class="btn btn-primary" id="btnNewDisciplina">
        <span class="glyphicon glyphicon-plus"> Disciplina</span> 
    </a>    
  </div>
</div>

<div class="modal fade" id="modalDisciplina" tabindex="-1" role="dialog" aria-labelledby="Modal disciplina">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalDisciplinaLabel">Incluir disciplina</h4>
      </div>
      <div class="modal-body">
        <?=$this->Form->create('GradeCurricular', ['id'=>'formGrade'])?>        
            <?=$this->Form->input('id', ['label'=>false, 'class'=>'form-control', 'id'=>'id' ,'type'=>'hidden'])?>
            <?=$this->Form->input('turma_id', ['type'=>'hidden', 'value'=>$turma->id])?>
          <div class="form-group">
            <label class="control-label">Disciplina</label>
            <?=$this->Form->input('disciplina_id', ['label'=>false, 'class'=>'form-control', 'id'=>'disciplina_id'])?>
          </div>
          <div class="form-group">
            <label class="control-label">Carga Horária</label>
            <?=$this->Form->input('carga_horaria', ['type'=>'number','label'=>false, 'class'=>'form-control', 'id'=>'cargaHoraria'])?>
          </div>
          <div class="form-group">
            <label class="control-label">Professor</label>
            <?=$this->Form->input('professor_id', ['label'=>false, 'class'=>'form-control', 'options'=>$professores, 'id'=>'professor_id'])?>
          </div>
          <div class="form-group">
            <label class="control-label">Obrigatoria</label>
            <?=$this->Form->checkbox('obrigatorio', ['hiddenField' => false, 'label'=>false, 'class'=>'form-control', 'id'=>'obrigatorio']);?>
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-save"> Salvar</span> 
        </button>
      </div>
      </form>
    </div>
  </div>
</div>