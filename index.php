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

<!DOCTYPE HTML>
<html>
	<head><link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
 
		
        <script>
		
			function verifica(){
			
				 var nav = navigator.userAgent.toLowerCase();
    			if(nav.indexOf("chrome") != -1){
       				browser = "chrome";
    			}else{
					browser = "ie";
    			}
				if(browser == "ie"){
					//window.alert("Você está usando o navegador Internet Explorer ou Firefox!!!\n \n Por questões técnicas, pedimos que utilize o sistema com o navegador Google Chrome.\n \n Caso você queira prosseguir com o navegador atual, o sistema poderá ter perda de dados ou recursos durante sua utilização.\n Agradecemos a sua compreensão!\n \n Dúvidas comunicar ao setor de T.I.");
					
					
					
					
					
					
					//seleciona os elementos a com atributo name="modal"

		

			//cancela o comportamento padrão do link

			//e.preventDefault();

 		

			//armazena o atributo href do link

			var id = "#dialog";

 			

			//armazena a largura e a altura da tela

			var maskHeight = $(document).height();

			var maskWidth = $(window).width();

 

//Define largura e altura do div#mask iguais ás dimensões da tela

		$('#mask').css({'width':maskWidth,'height':maskHeight});

 

//efeito de transição

		$('#mask').fadeIn(1000);

		$('#mask').fadeTo("slow",0.8);

 

//armazena a largura e a altura da janela

		var winH = $(window).height();

		var winW = $(window).width();

//centraliza na tela a janela popup

		$(id).css('top',  winH/2-$(id).height()/2);

		$(id).css('left', winW/2-$(id).width()/2);

//efeito de transição

		$(id).fadeIn(2000);



 

//se o botãoo fechar for clicado

		$('.window .close').click(function (e) {

//cancela o comportamento padrão do link

			e.preventDefault();

			$('#mask, .window').hide();

		});

 

//se div#mask for clicado

		$('#mask').click(function () {

		$(this).hide();

		$('.window').hide();

		});
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				}
			
			}
			

		</script>
  
		<title>Login</title>
	</head>

	<body onLoad="verifica()">
    
    <center><img src="img/logo.png"></center>
    
    <br>
    <br>
    <br>
	<h2><p style="color:#D3D3D3;" class="text-center">Ordem de Serviço</h2></p>
    <br>
    <br>
    <br>
    
    
    
    
    <div id="tudo">
    
    <div id="boxes">

 

<!-- #personalize sua janela modal aqui -->

 

		<div id="dialog" class="window">

			

<!-- Botão para fechar a janela tem class="close" -->

			<a href="#" class="close">Fechar [X]</a><br />
            
           <img src="img/modal.png" />
            
            		
        </div>

 

<!-- Não remova o div#mask, pois ele é necessário para preencher toda a janela -->

		<div id="mask"></div>
    </div>
    
    <?php
		


	?>	
    
    	
    
    	<form class="container" id="login" method="post" action="loading.php">
        	<table>
				<div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Login</span>
                    </div>
                    <input type="text" class="maiuscula"  name="txtLogin" maxlength="25" size="25" aria-describedby="inputGroup-sizing-sm">
                </div> 
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Senha</span>
                    </div>
                    <input type="password" name="psSenha" maxlength="25" size="25" aria-describedby="inputGroup-sizing-sm">
                </div>    	
                        <hr>
                    </td>
                </tr>
                <tr>
                	<td>
	
                    	 <input type="submit" class="btn btn-primary btn-sm" name="btLogar" value="Logar"/>
						<!-- <input type="image" src='img/botao-login.png' name="btLogar" value="submit"/> -->
                    </td>
                    <td>
                    	<input type="reset" class="btn btn-warning btn-sm" name="btLimpar" value="Limpar"/>
                    </td>
                </tr>
        	</table>
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
	</body>
</html>