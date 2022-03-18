<?php
	session_start();
	//$_SESSION["login"] = 0;
	
	
	
	include("config/banco.php");
	
	if(isset($_SESSION["login"])){
		
		if($_SESSION["login"] == 1){
			echo $_SESSION["Cod_colaborador"];
			header("location:loading.php");
			
		}
		
	}
	
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<style>
/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://wallpapers.com/images/high/round-green-gradient-khzm1oetyadi0kwg.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 90%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 360px;
margin-top: auto;
margin-bottom: auto;
width: 600px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.input-group-prepend span{
width: 40px;
background-color: #1E90FF;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #1E90FF;
width: 100px;
margin: 0 15px
}

.login_btn:hover{
color: black;
background-color: white;
}

.limpar_btn{
color: black;
background-color: #DAA520;
width: 100px;
}

.limpar_btn:hover{
color: black;
background-color: white;
}

.logo:displayed{
	display: block;
	vertical-align: middle
	margin-left:auto;
	top: 50%;
margin-right:auto }

.links{
color: white;
}

input.maiuscula {
  text-transform: uppercase;
}

.links a{
margin-left: 4px;
}
</style>
<head>
	<title>Login Page</title>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
		<br>
		<center><img src="img/logo.png"></center>
		<h2><p style="color:#D3D3D3;" class="text-center">Ordem de Serviço</h2></p> 
			<div class="card-body">
				<form id="login" method="post" action="loading.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="txtLogin" class="maiuscula form-control" placeholder="Usuário">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="psSenha" class="form-control" placeholder="SENHA">
					</div>
					<div class="form-group">
					<div>
						<input type="reset" value="Limpar" name="btLimpar" class="btn float-right limpar_btn">
						<input type="submit" value="Login" name="btLogar" class="btn float-right login_btn">
					</div>
				</form>
				        <?php
		
		
		
			@$login = strtoupper($_POST["txtLogin"]);
			@$senha = $_POST["psSenha"];
			
			
			
			$_SESSION["usuario"] = $login;
			
			$_SESSION["senha"] = $senha;
			
			if(isset($_POST["btLogar"])){
				
				
			
				if($login == "" || $senha == ""){
					echo "Preencha todos os campos!";
				}else{
					$sql = "select *  from colaborador";
				
					$query = mysqli_query($conexao, $sql);
				
					while($sql = mysqli_fetch_array($query)){
						if($sql["User"] == $login && $sql["Senha"] == $senha){
							//echo "Usuario existente";
							$_SESSION["Cod_colaborador"] = $sql["Cod_colaborador"];
							//echo $_SESSION["Cod_colaborador"];
							
							$_SESSION["login"] = 1;
							
							if($sql["Perfil"] == 0){
								
								$_SESSION["admin"] = true;
								
							}else{
								$_SESSION["admin"] = false;
								
							}
							
	                         


							echo '<font face=verdana size=3 color=red><center> <br><br>
                             <img src="img/loading.gif"></font></center>
                             <META HTTP-EQUIV="refresh" CONTENT="3; URL=loading.php">';
							

						}else{
							
							$msg = "Usuário ou senha incorretos!"; 
							
							echo $msg;
						}
					}
					
					
				}
				
				
			}
		
		?>
			</div>
		</div>
	</div>
</div>
</body>
</html>