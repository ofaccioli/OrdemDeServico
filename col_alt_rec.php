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
		
		 
		 
		 
		$Colaborador = $_POST["txtColaborador"];
		$departamento = $_POST['txtDepartamento'];
		$perfil = $_POST['txtPerfil'];
		$user = $_POST["txtUser"];
		
		 $cod = $_POST['codigo'];
		 
		

		 
		 try{
		 
			 $sql = "update Colaborador set  Nome_Colaborador = '$Colaborador', Cod_departamento = '$departamento', Perfil = '$perfil', User = '$user' where Cod_Colaborador = $cod";
					
		 	
			$query = mysqli_query($conexao, $sql);
			
			
					
		 }catch(Exception $erro){
			 echo "Erro: ".$erro;
		 }
		
		
	?>
    
    <div id="conteudo">
	
    	<h1>O Colaborador foi alterado com sucesso </h1>
        
        <h3>O que deseja fazer agora?</h3>
        
         <br><hr><br>
        
        <table class="tbprincipal">
        	<tr>
            	<td><a href="principal.php"><img src="img/home.png"></a></td>
                <td><a href="principal.php">Página Principal</a></td>
            </tr>
            <tr>
            	<td><a href="col_alt.php"><img src="img/alterar_0.png"></a></td>
                <td><a href="col_alt.php">Alterar outro colaborador</a></td>
            </tr>
            
        </table>
        
       
        
       <a href='logout.php'><img class='sair' src='img/sair.png'></a><br>
       
       <hr color="#EEE9E9">

    </div>
    
	</body>
</html>