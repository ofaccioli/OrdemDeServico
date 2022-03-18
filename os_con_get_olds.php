<?php
	include("config/banco.php");

	$cod = $_GET["a"];	
	$ini = $_GET["b"];
	$fim = $_GET["c"];
	
	if($fim == ""){
		
		$sql_limit2 = "select Data from os order by data desc limit 1";
	
		$query_limit2 = mysqli_query($conexao, $sql_limit2);
	
		while($sql_limit2 = mysqli_fetch_array($query_limit2)){
		
			$fim = $sql_limit2['Data'];
			
		}
	}else{
		
		$fim = $_GET["c"];
		
		$data_fim = explode("/",$fim);
		
		$fim = $data_fim[2]."-".$data_fim[1]."-".$data_fim[0];
	}
	
	if($ini == ""){
		
		$sql_limit = "select Data from os order by data asc limit 1";
	
		$query_limit = mysqli_query($conexao, $sql_limit);
	
		while($sql_limit = mysqli_fetch_array($query_limit)){
		
			$ini = $sql_limit['Data'];
		
		}
	}else{
		
		$ini = $_GET["b"];
		
		$data_ini = explode("/",$ini);
		
		$ini = $data_ini[2]."-".$data_ini[1]."-".$data_ini[0];
		
	}
	

			if($cod == "todos"){
				
				$sql = "select r.Cod_os, r.Data, c.Nome_colaborador, d.Nome_setor,r.Prioridade as Prioridade,r.Prioridade_tec as Prioridade2, r.Finalizado as Finalizado, r.Titulo_OS from os r inner join Colaborador c on r.Cod_colaborador = c.Cod_colaborador inner join setor d on r.Cod_setor = d.Cod_setor where r.Data between '".$ini."' and '".$fim."' order by r.Cod_os desc";
				
			}else{
				$sql = "select r.Cod_os, r.Data, c.Nome_colaborador, d.Nome_setor,r.Prioridade as Prioridade,r.Prioridade_tec as Prioridade2, r.Finalizado as Finalizado, r.Titulo_OS from os r inner join Colaborador c on r.Cod_colaborador = c.Cod_colaborador inner join setor d on r.Cod_setor = d.Cod_setor where c.Cod_colaborador = ".$cod." and r.Data between '".$ini."' and '".$fim."' order by r.Cod_os desc";
			}


	$query = mysqli_query($conexao, $sql);
	
	echo "<form method='post' action='os_con_rec.php'>";
	
	echo "<table class='tbget'>";
		
	echo "
		
		<tr>
			
			<th>
				Numero
			</th>
			<th>
				Status
			</th>
			<th>
				Data
			</th>
			<th>
				Colaborador
			</th>
			<th>
				Setor
			</th>
			<th>
				Prioridade
			</th>
			<th>
				Prioridade Técnica
			</th>
			<th>
				Assunto
			</th>
		</tr>
		
		";
	
	while($sql = mysqli_fetch_array($query)){
			
			$Prioridade = $sql["Prioridade"]; 
			$Prioridade2 = $sql["Prioridade2"];
			$Finalizado = $sql["Finalizado"];
		
		if ($Prioridade == 0){
			$Prioridade = "Baixa";
			$Prioridade = '<span style="color:Navy"><b>' .$Prioridade.'</b></span>';
			
		}elseif($Prioridade == 1){
			$Prioridade = "Media";
			$Prioridade = '<span style="color:#228B22"><b>' .$Prioridade.'</b></span>';
		}else{
			$Prioridade = "Alta";
			$Prioridade = '<span style="color:red"><b>' .$Prioridade.'</b></span>';
		}
		
			if ($Prioridade2 == 0){
			$Prioridade2 = "Baixa";
			$Prioridade2 = '<span style="color:Navy"><b>' .$Prioridade2.'</b></span>';
			
		}elseif($Prioridade == 1){
			$Prioridade2 = "Media";
			$Prioridade2 = '<span style="color:#228B22"><b>' .$Prioridade2.'</b></span>';
		}else{
			$Prioridade2 = "Alta";
			$Prioridade2 = '<span style="color:red"><b>' .$Prioridade2.'</b></span>';
		}
		
        if ($Finalizado == 0){
			$Finalizado = "Pendente";
			$Finalizado = '<span style="color:Navy"><b>' .$Finalizado.'</b></span>';
			
		}elseif($Finalizado == 1){
			$Finalizado = "Em Andamento";
			$Finalizado = '<span style="color:#228B22"><b>' .$Finalizado.'</b></span>';
		}else{
	      	$Finalizado = "Concluido";
			$Finalizado = '<span style="color:red"><b>' .$Finalizado.'</b></span>';
		}
		
		$date = new DateTime($sql['Data']);
		
		echo "
		
			<tr onMouseOver='ponteiro()' class='linha' onDblClick='seleciona(".$sql['Cod_os'].")'>
				
				<td>
					".$sql['Cod_os']."
				</td>
				<td>
					".$Finalizado."
				</td>
				<td>
					".$date->format('d/m/Y')."
				</td>
				<td>
					".$sql['Nome_colaborador']."
				</td>
				<td>
					".$sql['Nome_setor']."
				</td>
				<td>
					".$Prioridade."
				</td>
				<td>
					".$Prioridade2."
				</td>
				<td>
					".$sql['Titulo_OS']."
				</td>
			</tr>
		
		";
		
			
	}
	
	echo "</table>";
	
	echo "<br>";
	
	
	
	echo "</form>";

?>
