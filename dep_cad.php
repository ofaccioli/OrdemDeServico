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
		<title>Cadastrar Requisi&ccedil;&atilde;o</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        
        <script>
		
			
		
	
		
		$(document).ready(function(){
		
			
			 
			
			 
			
		
		});
		
		

		</script>
        
	</head>

	<body>
    
    <header>
    </header>
    <div id="conteudo">
   
    
	<h1>Cadastro de Departamentos</h1>
    
    <form method="post" action="dep_cad_rec.php">
    
    	
        <table >
        	<tr>
            	<td>
                	Departamento:
                </td>
                <td>
                	<input type="text" maxlength="50" size="50" name="txtDepartamento" />
                </td>
            </tr>           
          
 	
        </table>
        
        <br/>
        <hr>
        <br/>
        
        <input type="image" src='img/cadastrar.png' value="Cadastrar" name="btCadastrar" />
        <a href="principal.php"><img src="img/cancelar.png"</a>
       
    
    </form>
    
    
	</div>
    
  
    
	</body>
</html>