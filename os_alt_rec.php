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
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<title>Alterar</title>
	</head>

	<body>
    
    <?php
		
		 $colaborador = $_POST["codigo"];
		 $materiais = $_POST['taMateriais'];
		 $status = $_POST['slStatus'];
		 $descservos = $_POST['taDescServico'];
		 $Prioridade_tec = $_POST['slPrioridadeTec'];
		 $assunto =  $_POST['txtTitulo'];
		 
		 $dataInicio = new DateTime($_POST['txtInicio']);
		 $dataInicioFormatada = $dataInicio->format('Y-m-d');
		 
		 $dataFim = new DateTime($_POST['txtFim']);
		 $dataFimFormatada = $dataFim->format('Y-m-d');
		
		 try{
		 
	      	 	//$sql = "update os set Materias_os = '$materiais', Data_inicio = '$dataInicioFormatada', Data_final = '$dataFimFormatada', Finalizado = '$status' where Cod_os = $colaborador";
				$sql = "update os set Titulo_os = '$assunto', Materiais_os = '$materiais', Descricao_servos = '$descservos', Prioridade_tec = '$Prioridade_tec', Data_inicio = '$dataInicioFormatada', Data_final = '$dataFimFormatada', Finalizado = '$status' where Cod_os = $colaborador";
					
		 	    $query = mysqli_query($conexao, $sql);
				
			
		 }catch(Exception $erro){
			 echo "Erro: ".$erro;
		 }
		
		
	?>
    
    <div id="conteudo">
	
    	<h1>A Ordem de Serviço <?php echo $colaborador; ?> foi alterada com sucesso </h1>
        
        <h3>O que deseja fazer agora?</h3>
        
        <br><hr><br>
        
        <table class="tbprincipal">
        	<tr>
            	<td><a href="principal.php"><img src="img/home.png"></a></td>
                <td><a href="principal.php">Página Principal</a></td>
            </tr>
            <tr>
            	<td><a href="os_alt.php"><img src="img/alterar_0.png"></a></td>
                <td><a href="os_alt.php">Alterar outra OS</a></td>
            </tr>
            
        </table>
        
       
        
       <a href='logout.php'><img class='sair' src='img/sair.png'></a><br>
       
       <hr color="#EEE9E9">

    </div>
    
	</body>
</html>