<script type="text/javascript">
    $(function(){
        $('#cursoId').change(function(){            
            $.getJSON('../turma/getTurmas/'+$(this).val(), function( turmas ) {

                var opcoes = '<option value>Escolha uma turma</option>';
                $.each( turmas, function( i, item ) {
                    opcoes += '<option value='+item.id+'>'+item.nome+'</option>';
                });

                $('#turmasId').html(opcoes).show();
            //$('#turmasId').html();            
            });
        });
    });
</script>
<div class="col-md-9"> 
<div class="panel panel-default">
  <div class="panel-heading">Turmas</div>
  <div class="panel-body">
    <?=$this->Form->create()?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('curso', ['class'=>'form-control', 'options'=>$cursos, 'empty'=>'Escolha um curso', 'id'=>'cursoId']);?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?=$this->Form->input('turma', ['class'=>'form-control', 'options'=>[], 'empty'=>'Escolha uma turma', 'id'=>'turmasId']);?>
            </div>            
        </div>                
    </div>
    <div class="row col-md-10">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"><i> Grade</i></span> 
            </button>    
        </div>        
    </div>
    <?=$this->Form->end()?>
  </div>
</div>
</div>