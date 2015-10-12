<script type="text/javascript">
    $(function(){
        $('#btnAprovar').click(function(){
            if(confirm('Aprovar reposição?')){
                $('#status').val('A');
                $('#reposicaoForm').submit();
            }
            
        });
        $('#btnRejeitar').click(function(){
            if(confirm('Rejeitar reposição?')){
                $('#status').val('R');
                $('#reposicaoForm').submit();
            }
        });
    });
</script>
<div class="panel panel-default">
  <div class="panel-heading">Reposição pendente/ <?=$reposicaoAntecipacao->aula['professor']?></div>
  <div class="panel-body">
    <?=$this->Form->create($reposicaoAntecipacao, ['id'=>'reposicaoForm'])?>
    <?php //pr($reposicaoAntecipacao);?>
    <?=$this->Form->input('id');?>
    <?=$this->Form->input('status', ['type'=>'hidden', 'id'=>'status']);?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=$this->Form->input('justificativa', ['div'=>false, 'class'=>'form-control', 'label'=>'justificativa', 'disabled'=>true]);?>
            </div>    
        </div>
    </div>   
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?=$this->Form->input('dataReposicao', ['type'=>'text', 'div'=>false, 'class'=>'form-control', 'label'=>'Repor em', 'disabled'=>true]);?>
            </div>    
        </div>        
    </div>
    
    <h4>Aulas</h4>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Turma</th>
                <th>Data</th>
                <th>Aula</th>
                <th>Reposicao</th>
                <th>Status</th>
            </tr>            
        </thead>               
        <tbody>
    <?php foreach ($reposicaoAntecipacao->aula_reposicao_antecipacao as $key => $aula): ?>
        <tr>
            <td><?=$aula->aula->calendario->turma->nome."/".$aula->aula->calendario->turma->curso->sigla?></td>
            <td><?=$aula->aula->calendario->data?></td>
            <td><?=$aula->aula->aula?></td>
            <td><?=$aula->aula_repor?></td>
            <td><?=$aula->status == 'C' ? 'Criada' : ($aula->status =='M' ? 'Ministrada' : 'Faltou')?></td>
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>    
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=$this->Form->input('observacao', ['div'=>false, 'class'=>'form-control', 'label'=>'Observação']);?>
            </div>    
        </div>
    </div>   
    <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                <a href="#" class="btn btn-success" id="btnAprovar">Aprovar</a>
            </div>                
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <a href="#" class="btn btn-danger" id="btnRejeitar">Rejeitar</a>
            </div>                
        </div>        
    </div>       
    <?=$this->Form->end();?>
</div>
