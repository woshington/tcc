<script type="text/javascript">
	$(function(){
		$('#fieldCalendar').hide();
		$(":button" ).click(function(){
			var classe = $(this).attr('class');
			if(classe=='btn btn-primary'){				
				$(this).removeClass();
				$(this).addClass('btn btn-danger');
			}else if(classe=='btn btn-danger'){
				$(this).removeClass();
				$(this).addClass('btn btn-primary');
			}
		});
		$('#saveCalendar').click(function(){
			if(confirm('Deseja salvar as alterações?')){				
				var calendario = new Array();
				$( "button" ).each(function( index, element ) {
					classe = $( element ).attr('class')
					if(classe=='btn btn-primary' || classe=='btn btn-danger'){
						//console.log($( element ).attr('value'));	
						var obj= new Object();
					    obj.dia = $( element ).attr('value');
					    if(classe=='btn btn-primary')
					    	obj.letivo = true;
					    else
					    	obj.letivo = false;
					    obj.ano = <?=@$ano?>;
					    obj.mes = <?=@$mes?>

					    calendario .push(obj);
					}				
			  	});
			  	$('#fieldCalendar').val(JSON.stringify(calendario));
			  }else{
			  	return false;
			  }			  
		});
	});
	
</script>

<table class="table table-bordered" style="width: 400px;" id="calendar">
	<caption>Calendário Letivo - <?=@$ano?></caption>
	<thead>
		<tr>
			<th colspan="7">
				<?=$this->Html->link(__("<<"), ['action'=>'calendario', $turma->id, $mes-1, $ano])?>
				<?=$meses[$mes]?>
				<?=$this->Html->link(__(">>"), ['action'=>'calendario', $turma->id, $mes+1, $ano])?>
			</th>
		</tr>
		<tr>
			<th>DOM</th>
			<th>SEG</th>
			<th>TER</th>
			<th>QUA</th>
			<th>QUI</th>
			<th>SEX</th>
			<th>SAB</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
				$dia_semana = 0;
				for($i=0;$i<$first_day['wday'];$i++){
					echo "<td></td>";
					$dia_semana++;
				}
				$dia = 1;

				while($dia<=$last_day){
					if($dia_semana==7){
						echo "</tr>";
						echo "<tr>";
						$dia_semana = 0;
					}
					$dataTime = mktime(0,0,0, $mes, $dia, $ano);
        			$data_dia = getdate($dataTime);
        			/*if($data_dia['wday']>=1 and $data_dia['wday']<6){
						echo "<td><button class='btn btn-primary' value='$dia' style='width: 60px;'>".$dia."</button></td>";
        			}else{
						echo "<td><button class='btn btn-danger' value='$dia' style='width: 60px;'>".$dia."</button></td>";
        			}*/
        			if(@$cal_mes[$dia]){
        				echo "<td><button class='btn btn-primary' value='$dia' style='width: 60px;'>".$dia."</button></td>";
        			}elseif(@$cal_mes[$dia]==false){
        				echo "<td><button class='btn btn-danger' value='$dia' style='width: 60px;'>".$dia."</button></td>";
        			}elseif(!($data_dia['wday']>=1 and $data_dia['wday']<6)){
        				echo "<td><button class='btn btn-danger' value='$dia' style='width: 60px;'>".$dia."</button></td>";
        			}else{
        				echo "<td><button class='btn btn-primary' value='$dia' style='width: 60px;'>".$dia."</button></td>";
        			}
					$dia++;
					$dia_semana++;
				}
				echo "</tr>";
			?>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="7">
			<?=$this->Form->create()?>
				<textarea id="fieldCalendar" name="fieldCalendar">
					
				</textarea>
				<button class="btn btn-info" id="saveCalendar" type="submit">
					Salvar Calendario
				</button>
			</form>				
			</td>
		</tr>
	</tfoot>
</table>