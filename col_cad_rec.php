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
		<title>Colaborador</title>
	</head>

	<body>
    
    <?php
		
		 $Colaborador = $_POST["txtColaborador"];
		 $Departamento = $_POST["txtDepartamento"];
		 $User = strtoupper($_POST["txtUser"]);
		 $Senha = $_POST["txtSenha"];
		 $Perfil = $_POST["txtPerfil"];
		 
		 
		 

		 
		 try{
		 
			 
			 $sql_val = "select * from colaborador where user = '".$User."'";
			 
			 $query_val = mysqli_query($conexao, $sql_val);
			 
			 $busca = mysqli_num_rows($query_val);
			 
			 if($busca != 0){
			 	
				echo "<h1>Já existe um usuário com este nome de usuário, <a href='col_cad.php'>tente novamente...</a></h1>";
				
			 }else{
			 
			
			 
			 
			 		$sql = "insert into Colaborador values (null, '$Departamento', '$Colaborador', '$User', '$Senha','$Perfil')";
					
		 			$query = mysqli_query($conexao, $sql);
			
				
			
	?>
   
    
    <div id="conteudo">
	
    	<h1>O Colaborador <?php echo $Colaborador ?> foi cadastrado com sucesso </h1>
        
        <h3>O que deseja fazer agora?</h3>
        
         <br><hr><br>
        
        <table class="tbprincipal">
        	<tr>
            	<td><a href="principal.php"><img src="img/home.png"></a></td>
                <td><a href="principal.php">Página Principal</a></td>
            </tr>
            <tr>
            	<td><a href="col_cad.php"><img src="img/cadastrar_0.png"></a></td>
                <td><a href="col_cad.php">Cadastrar outro colaborador</a></td>
            </tr>
            
        </table>
        
       
        
       <a href='logout.php'><img class='sair' src='img/sair.png'></a><br>
       
       <hr color="#EEE9E9">
       
       
        <?php		
		
			 }
			
		 }catch(Exception $erro){
			 echo "Erro: ".$erro;
		 }
		
		
	?>
       
    </div>
    
	</body>
</html>