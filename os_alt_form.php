<?php
	session_start();
	include("config/banco.php");
	header ('Content-type: text/html; charset=utf-8');
	
	if(isset($_SESSION["login"])){
		
		if($_SESSION["login"] == 0){
			
			header("location:index.php");
			
		}
		
	}else{
		header("location:index.php");
	}
	
?>
<!DOCTYPE HTML>
<html>
	<head><link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		
        
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<title>OS</title>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
       
	   <?php
	
		$_SESSION["cod_ordem"] = $_POST["altcodigo"];
		
		$sql_os = "select * from os where Cod_os = ".$_POST["altcodigo"];
		
		$query_os = mysqli_query($conexao, $sql_os);
		
		while($sql_os = mysqli_fetch_array($query_os)){
			
			$date = new DateTime($sql_os['Data']);
		    $dtInicio = new DateTime ($sql_os['Data_inicio']);
		    $dtFim = new DateTime ($sql_os['Data_final']);
			
		 	$cod_ordem = $sql_os['Cod_os'];
			$cod_col = $sql_os['Cod_colaborador'];
		 	$desc = $sql_os['Descricao_os'];
			$descservos = $sql_os['Descricao_servos'];
			$assunto = $sql_os['Titulo_os'];
			$cod_setor = $sql_os['Cod_setor'];
		 	$materiais = $sql_os['Materiais_os'];
			$Prioridade = $sql_os['Prioridade'];
			$Prioridade_tec = $sql_os['Prioridade_tec'];

		    $status = $sql_os['Finalizado'];
		 
		 
			
			$sql_col = "select * from colaborador where Cod_colaborador = '".$cod_col."'";
		
			$query_col = mysqli_query($conexao, $sql_col);
		
			while($sql_col = mysqli_fetch_array($query_col)){
				
				$colaborador = $sql_col['Nome_colaborador'];
				$cod_dpto = $sql_col['Cod_departamento'];
				
				$sql_dpto = "select * from departamento where Cod_departamento = '".$cod_dpto."'";
			
				$query_dpto = mysqli_query($conexao, $sql_dpto);
			
				while($sql_dpto = mysqli_fetch_array($query_dpto)){
					
					$dpto = $sql_dpto['Nome_departamento'];
					
			        $sql_setor = "select * from setor where Cod_setor = '".$cod_setor."'";
			
						$query_setor = mysqli_query($conexao, $sql_setor);
			
						while($sql_setor = mysqli_fetch_array($query_setor)){
						
							$setor = $sql_setor['Nome_setor'];
						}
				}
			}	
		}
	?>

	        
	</head>

	<body>
    
   
    
    <style>
	
	body{
	font-family: Tahoma;
	font-size:10px;
	margin: auto;
}
.titulo{
	font-size: 10px;
	float: right;
}
#titulo{
	width: 975px;
	margin: auto;
}
#parte1{
	border-style: solid;
    border-color: #778899;
	width: 975px;
	background-color: #EEE9E9;
	
	margin: auto;
	margin-top: 15px;
}
#parte2{
	border-style: solid;
    border-color: #778899;
	width: 975px;
	background-color: #EEE9E9;
	/*font-size:9px;*/
	
	margin: auto;
	margin-top: 15px;
}
#parte2 td{
	height: 20px;
}
table{
	margin:auto;
}
#parte3{
	border-style: solid;
    border-color: #778899;
	width: 975px;
	background-color: #EEE9E9;
	/*font-size:9px;*/
	
	margin: auto;
	margin-top: 15px;
}
textarea{
	resize: none;
}

input{
	
}
	

	
	</style>

    
    <script>
jQuery(function($){
$("#campoData").mask("99/99/9999");
$("#campoData2").mask("99/99/9999");
   </script>   
    
    
    <div id="titulo">
	    <h1>OS (Modo de Alteração)<span class="titulo">N&ordm; <?php echo $cod_ordem; ?>  |  Data: <?php echo $date->format('d/m/Y'); ?></span></h1> 
    </div>
    

    
    <div id="parte1">
    
    <form name="form1" action="os_alt_rec.php" method="post">
    
    	<input type="hidden" name="codigo" value="<?php echo $_POST["altcodigo"] ?>">

	
        <table >
		<tr>
		<td>
        <h3>Solicitante</h3>
		</td>
		</tr>
            	<td>
                	Solicitante:
                </td>
				<tr>
                <td>
			
		                        <input type="text" maxlength="50" size="50" name="txtSolicitante" value="<?php echo $colaborador ?>" readonly/>
                </td> 
				</tr>
            </tr>
            <tr>
            	<td>
                	Departamento:
                </td>
			</tr>
			<tr>
                <td colspan="3">
                	<input type="text" maxlength="50" size="50" name="txtDepartamento" value="<?php echo $dpto ?>"readonly/>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
			<tr>
			<td>
            Prioridade:
            </td>
			</tr>
			<tr>
            <td>
			<?php
					
									if($Prioridade == 0){
										$Prioridade_value = "Baixa";
										
										echo "
										
											<script>
											</script>
										
										";
										
									}else if($Prioridade == 1){
										$Prioridade_value = "Media";
									}else{
										$Prioridade_value = "Alta";
									}
					
								?>
            
            <select required name="slPrioridade" onChange="Prioridade(this.value)" readonly="readonly">
			<option value="<?php echo $Prioridade; ?>"><?php echo $Prioridade_value; ?></option>
            </select>
            </td>
            <tr>
			<td>
			<h3>Serviço Solicitado</h3>
			</td>
			</tr>
			<tr>
            	<td>
                	Assunto:
                </td>
			</tr>
			 <td colspan="3">
                	<input type="text" maxlength="50" size="50" name="txtTitulo" value="<?php echo $assunto ?>"readonly/>
                </td>
			<tr>
            	<td>
                	Descri&ccedil;&atilde;o:
                </td>
			</tr>
            <tr>			
                <td colspan="5">
                <textarea cols="111" rows="5" name="txtDesc" id="txtDesc" maxlength="2000" readonly="readonly"><?php echo $desc; ?></textarea>
                </td>
            </tr>
			<tr>
            	<td>
                	Local/Setor:
                </td>
			</tr>
<tr>			
                <td colspan="5">
				
                	<select required  name="slSetor" onchange="setor(this.value)">
					<option value="<?php echo $setor; ?>"><?php echo $setor; ?></option>
                    </select>
                    
                </td>
            </tr>
         <tr>
            	<td>
                	<h3>Materiais
                </td>
                <td>
			</tr>	
            <tr>
            	<td colspan="6">
                	Materiais Utilizados
                </td>
            </tr>
            <tr>
            	<td colspan="6">
                	<textarea name="taMateriais" cols="111" rows="3" maxlength="535"><?php echo $materiais; ?></textarea>
                </td>
            </tr>
			    <tr>
            	<td colspan="6">
                	Descrição do Serviço
                </td>
            </tr>
            <tr>
            	<td colspan="6">
                	<textarea name="taDescServico" cols="111" rows="5" maxlength="2000"><?php echo $descservos; ?></textarea>
                </td>
			</tr>
			<tr>
            <td>
			Prioridade Técnica:
			</td>
			</tr>
			<tr>
			<td>
			<?php
					
									if($Prioridade_tec == 0){
										$Prioridade_tec_value = "Baixa";
										
										echo "
										
											<script>
											</script>
										
										";
										
									}else if($Prioridade_tec == 1){
										$Prioridade_tec_value = "Media";
									}else{
										$Prioridade_tec_value = "Alta";
									}
					
								?>
           
            <select required name="slPrioridadeTec" onChange="Prioridade_tec(this.value)">
			<option value="<?php echo $Prioridade_tec; ?>"><?php echo $Prioridade_tec_value; ?></option>
			<option disabled>─────</option>
			<option value="0">Baixa</option>
            <option value="1">Media</option>
			<option value="2">Alta</option>
            </select>
            </td>
			<tr>
            	<td>
                Data de Inicio:
                </td>
				</tr>
				<tr>
                <td>
                	<input type="date" maxlength="10" size="10" name="txtInicio" id="campoData" value="<?php echo date_format($dtInicio, 'Y-m-d'); ?>"/>
                </td>
				</tr>
				<tr>
				<td>
                Data de Finalização:
                </td>
				</tr>
				<tr>
                <td>
                	<input type="date" maxlength="10" size="10" name="txtFim" id="campoData2" value="<?php echo date_format($dtFim, 'Y-m-d'); ?>"/>
                </td>
            </tr>
			<tr>
			<td>
            Status:
            </td>
			</tr>
			<tr>
            <td>
			<?php
					
									if($status == 0){
										$status_value = "Pendente";
										
										echo "
										
											<script>
											</script>
										
										";
										
									}else if($status == 1){
										$status_value = "Em Andamento";
									}else{
										$status_value = "Concluido";
									}
					
								?>
            
            <select name="slStatus" onChange="Status(this.value)">
			<option value="<?php echo $status; ?>"><?php echo $status_value; ?></option>
			<option disabled>─────</option>
            <option value="1">Em Andamento</option>
            <option value="2">Concluido</option>
            </select>
            </td>
			</tr>
			
        </table>
        
        <br>
        <br>
        
        <input type="image" src="img/alterar.png" name="btAlterar" value="Alterar">
        <a href="principal.php"><img src="img/cancelar.png"</a>
    
    </form>
    
   
    </div>
    
    
  
	</body>
</html>
