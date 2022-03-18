<?php
	session_start();
	include("config/banco.php");
	header ('Content-type: text/html; charset=utf-8');
	
	$_SESSION["login"] == 1;
	
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
		<title>Ordem de Serviço</title>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  
       
	   <?php
	
		$sql_os = "select * from os where Cod_os = ".$_SESSION["cod_ordem"];
		
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

	<body onLoad="window.print();">
    
   
    
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
	
.parc1{
	font-size: 8px;
}
.venc1{
	font-size: 8px;
	background-color: #2F4F4F;
	color: white;
}
.parc2{
	font-size: 10px;
}
.venc2{
	font-size: 10px;
	background-color: #2F4F4F;
	color: white;
}

input[type=text],input[type=password],textarea,select{
	border-radius:4px;
	border:1px solid #F0FFFF;
}

.canhotodir{
	float: right;
	margin-right: 20px;
}
	

	
	</style>

     <script>
jQuery(function($){
$("#campoData").mask("99/99/9999");
$("#campoData2").mask("99/99/9999");
   </script>  

    <div id="titulo">
	    <h1><img src="img/logoprt.png" alt="GH" height="70" width="105" align="center">&emsp;Ordem de Serviço <?php echo $cod_ordem; ?><span class="titulo">N&ordm; <?php echo $cod_ordem; ?>  |  Data: <?php echo $date->format('d/m/Y'); ?></span></h1> 
    </div>
    

    
 <div id="parte1">
    
    <form name="form1" action="os_alt_rec.php" method="post">
    
    	<input type="hidden" name="codigo" value="<?php echo $_POST["altcodigo"] ?>">

	
        <table>
		
        <h1>Solicitante</h1>
		<h2>
            	
                	&nbspNome:
                
			
		                        <input type="text" maxlength="50" size="40" name="txtSolicitante" value="<?php echo $colaborador ?>" readonly/>
                
            &nbsp&nbsp&nbsp&nbsp
            
                	Departamento:
                
			
                	<input type="text" maxlength="50" size="40" name="txtDepartamento" value="<?php echo $dpto ?>"readonly/>
</h2>
               

		   
		  
		   
<h2>
            &nbspPrioridade:
            
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
            &nbsp
            <select required name="slPrioridade" onChange="Prioridade(this.value)" readonly="readonly">
			<option value="<?php echo $Prioridade; ?>"><?php echo $Prioridade_value; ?></option>
            </select></h2>
		
<table>
        	<td colspan="2">
            <center>__________________________________________________________________________________________________________________________________________________________________________________</center>
            </td>
            <td>
            </td>
</table>			
			<h1>Serviço Solicitado</h1>
			
			<table>
			<tr>
            	
                	<h2>Assunto:</h2>
                
			</tr>
			           			

			 </table>
			 <table>
			 
                	<input type="text" maxlength="50" size="50" name="txtTitulo" value="<?php echo $assunto ?>"readonly/>
             
</table>
			<table>
                	<tr><h2>Descri&ccedil;&atilde;o:</h2></tr>
					
              </table>
           			<br>
                <tr>
                <textarea cols="111" rows="5" name="txtDesc" id="txtDesc" maxlength="2000" readonly="readonly"><?php echo $desc; ?></textarea>
               </tr>
<br> 
<br>
            	<table>
                	<h2>Local/Setor:
                
                	<select required  name="slSetor" onchange="setor(this.value)" readonly="readonly">
					<option value="<?php echo $setor; ?>"><?php echo $setor; ?></option>
                    </select></h2>
					</table>
           <table>
		
		   <table>
        	<td colspan="2">
            <center>__________________________________________________________________________________________________________________________________________________________________________________</center>
            </td>
            <td>
            </td>
</table>
                	<h1>Materiais</h1>
               
         </table>
      <table>
                	<h2>Materiais Utilizados</h2>
              </table>
            	<table>
                	<textarea name="taMateriais" cols="111" rows="3" maxlength="535" readonly="readonly"><?php echo $materiais; ?></textarea>
              </table>
			  
<table>
                	<h2>Descrição do Serviço</h2>

</table>
<table>
           
                	<textarea name="taDescServico" cols="111" rows="5" maxlength="2000" readonly="readonly"><?php echo $descservos; ?></textarea>
           
	</table>		  
			  
		<table>	  
			<h2>Prioridade Técnica:
		
			
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
           
            <select required name="slPrioridadeTec" onChange="Prioridade_tec(this.value)" readonly="readonly">
			<option value="<?php echo $Prioridade_tec; ?>"><?php echo $Prioridade_tec_value; ?></option>
            </select></h2>
      </table>
			  
<table>
                <h2>Data de Inicio:
                
                
                	<input type="date" maxlength="10" size="10" name="txtInicio" id="campoData" readonly="readonly" value="<?php echo date_format($dtInicio, 'Y-m-d'); ?>"/>
       
	
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbspData de Finalização:
                
                
                	<input type="date" maxlength="10" size="10" name="txtFim" id="campoData2" readonly="readonly" value="<?php echo date_format($dtFim, 'Y-m-d'); ?>"/>
   
   
           &nbsp&nbsp&nbsp&nbsp Status:
           
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
            
            <select name="slStatus" onChange="Status(this.value)" readonly="readonly">
			<option value="<?php echo $status; ?>"><?php echo $status_value; ?></option>
            </select>
			</h2></table>
        </table>
    		   <table>
        	<td colspan="2">
            <center>__________________________________________________________________________________________________________________________________________________________________________________</center>
            </td>
            <td>
            </td>
</table>
    </form>
    
    <br/><br/><br/><br/><br/><br/>
    
    <table width="918px" >
    	<tr>
        	<td colspan="2">
            <center>______________________________________________________________________</center>
            </td>
            <td>
            </td>
            <td colspan="2">
           <center> ______________________________________________________________________</center>
            </td>
            <td>
            </td>
        </tr>
        <tr>
        	<td colspan="2">
            	<center>Técnico</center>
            </td>
            <td>
            </td>
            <td colspan="2">
            	<center>Verificado e Aprovado</center>
            </td>
            <td>
            </td>
        </tr>
        <tr>
        	<td colspan="8">
            	<br/><br/>
            </td>
        </tr>     
    </table>
      
    </table>
    
     </div>
    
  
	</body>
</html>
