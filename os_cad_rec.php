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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Solicitação</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
       
        
	</head>

	<body onLoad="history.go(+1)">
    
    <?php
		
		 $colaborador = $_SESSION["Cod_colaborador"];
		 $prioridade = $_POST['slPrioridade'];
		 $desc = $_POST['taDesc'];
		 $setor = $_POST['slSetor'];
		 $assunto = $_POST['txtTitulo'];
		 $materiais = "";
		 $dtInicio = "";
		 $dtFim = "";
		 $status = '0';
		 $desc_serv = "";
		 $prioridade_tec = '0';
		 
		 
		// $dataInicio = new DateTime($_POST['txtInicio']);
		 //$dataInicioFormatada = $dataInicio->format('Y/m/d');
		 
		// $dataFim = new DateTime($_POST['txtFim']);
		// $dataFimFormatada = $dataFim->format('Y/m/d');
		 
		// Passando data do text box "DD/MM/AAAA" para "AAAA-MM-DD"   
		 
		 try{
		 
			 $sql = "insert into os values (null, '$colaborador', '$setor', CURDATE(), '$prioridade', '$assunto', '$desc','$desc_serv', '$materiais','$$prioridade_tec','$dtInicio','$dtFim', '$status')";
					
		 
			
			$query = mysqli_query($conexao, $sql);
			
			
			
			$sql_con = "SELECT LAST_INSERT_ID(Cod_os) AS ultimoID FROM os ORDER BY Cod_os DESC LIMIT 1";
			
			//$_SESSION["Cod_req"] = $total;
			
			//echo $_SESSION["Cod_req"];
							
			$query_con = mysqli_query($conexao, $sql_con);
			
			while($sql_con = mysqli_fetch_array($query_con)){
				
				$_SESSION["Cod_os"] = $sql_con['ultimoID'];
				
				
				
			}
		
		
		 }catch(Exception $erro){
			 echo "Erro: ".$erro;
		 }
		
		
	?>
    
    <div id="conteudo">
	
    	<h1>A Ordem de Serviço foi cadastrada com sucesso </h1>
        
        <h3>O que deseja fazer agora?</h3>
        
        <br><hr><br>
        
        <table class="tbprincipal">
        	<tr>
            	<td><a href="principal.php"><img src="img/home.png"></a></td>
                <td><a href="principal.php">Página Principal</a></td>
            </tr>
            <tr>
            	<td><a href="os_cad.php"><img src="img/cadastrar_0.png"></a></td>
                <td><a href="os_cad.php">Cadastrar outra solicitação</a></td>
            </tr>
            <tr>
            	<td><a href="os_imp.php"><img src="img/print_0.png"></a></td>
                <td><a target="_blank" href="os_imp.php">Imprimir esta solicitação</a></td>
            </tr>
        </table>
        
       
        
       <a href='logout.php'><img class='sair' src='img/sair.png'></a><br>
       
       <hr color="#EEE9E9">

    </div>
    
	</body>
</html>