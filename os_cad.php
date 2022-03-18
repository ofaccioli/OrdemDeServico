<?php
	session_start();
	include("config/banco.php");
	
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
		<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<title>Cadastrar Ordem de Serviço</title>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
        
        
	</head>

	<body >
    
    <header>
    </header>
    <div id="conteudo">
    
    <h1>Cadastro de Ordem de Serviço</h1>
    <br>  
    <?php
		
		$sql = "select * from colaborador where Cod_colaborador = '".$_SESSION["Cod_colaborador"]."'";
		
		$query = mysqli_query($conexao, $sql);
		
		while($sql = mysqli_fetch_array($query)){
			
			$solicitante = $sql["Nome_colaborador"];
			
			$sql_dpto = "select * from departamento where Cod_departamento = '".$sql["Cod_departamento"]."'";
			
			$query_dpto = mysqli_query($conexao, $sql_dpto);
			
			while($sql_dpto = mysqli_fetch_array($query_dpto)){
				$dpto = $sql_dpto["Nome_departamento"];
			}
			
		}
	?>
    
    <form method="get" action="os_cad.php">

		<input type="hidden" id="dados" name="dados_enviar" value="" />

	</form>
    
    <form method="post" action="os_cad_rec.php">
    
    <h3>Solicitante</h3>
	
        <table >
            <tr>
            	<td>
                	Solicitante:
                </td>
			</tr>
			<tr>
                <td colspan="5">
                	<table >
                    	<tr>
                        	<td>
			                    <input type="text" maxlength="50" size="50" name="txtSolicitante" value="<?php echo $solicitante ?>"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
                	Departamento:
                </td>
			</tr>
			<tr>
                <td colspan="3">
                	<input type="text" maxlength="50" size="50" name="txtDepartamento" value="<?php echo $dpto ?>"/>
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
            &nbsp
            <select required name="slPrioridade" onChange="Prioridade(this.value)">
            <option value="">Selecione</option>
            <option value="0">Baixa</option>
            <option value="1">Média</option>
		    <option value="2">Alta</option>
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
                	<input type="text" maxlength="50" size="50" name="txtTitulo"/>
                </td>
			<tr>
            	<td>
                	Descri&ccedil;&atilde;o:
                </td>
			</tr>
            <tr>			
                <td colspan="5">
                	<textarea required name="taDesc" cols="100" rows="5" maxlength="2000"></textarea>
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
                    	<option value="">Selecione</option>
                        
						<?php
							
							$sql_setor = "select * from setor order by Nome_setor";
							
							$query_setor = mysqli_query($conexao, $sql_setor);
							
							while($sql_setor = mysqli_fetch_array($query_setor)){
								echo '<option value="'.$sql_setor["Cod_setor"].'">'.$sql_setor["Nome_setor"].'</option>';
							
							}
							
						?>
                    </select>
                    
                </td>
            </tr>
  <!--          <tr>
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
                	<textarea name="taMateriais" cols="100" rows="5" maxlength="535"></textarea>
                </td>
            </tr>
            	<td>
                Data de Inicio:
                </td>
				</tr>
				<tr>
                <td>
                	<input type="text" maxlength="10" size="10" name="txtInicio" id="txtInicio"  />
                </td>
				</tr>
				<tr>
				<td>
                Data de Finalização:
                </td>
				</tr>
				<tr>
                <td>
                	<input type="text" maxlength="10" size="10" name="txtFim" id="txtFim"  />
                </td>
            </tr>
			<tr>
			<td>
            Status:
            </td>
			</tr>
			<tr>
            <td>
            &nbsp
            <select name="slStatus" onChange="Status(this.value)">
            <option value="">Selecione</option>
            <option value="0">Em Andamento</option>
            <option value="1">Concluido</option>
            </select>
            </td>
			</tr>
			-->
        </table>
        
        <br/>
        <hr>
        <br/>
        
        <input type="image" src="img/cadastrar.png" value="Cadastrar" name="btCadastrar" id="btCadastrar" title="Se você não estiver conseguindo cadastrar, verifique se a solicitação foi justificada caso não tenha sido orçada"/>
        
        <a href="principal.php"><img src="img/cancelar.png"></a>
        <input type="hidden" name="Urgente" id="Urgente" />
    
    </form>
      
    
	</body>
</html>