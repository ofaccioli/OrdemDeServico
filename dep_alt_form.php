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
		<title>Requisi&ccedil;&atilde;o</title>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
       
	   <?php
	
		$_SESSION["Cod_dep"] = $_POST["altcodigo"];
		
		$sql = "select * from departamento where Cod_Departamento = ".$_POST["altcodigo"];
		
		$query = mysqli_query($conexao, $sql);
		
		while($sql = mysqli_fetch_array($query)){
			
			
			$nome = $sql['Nome_departamento'];
			
			
			
		 	
		}
	
	?>
	   
	 
     
		
		<script>
		
		
		
		
		
		
		
		$(document).ready(function(){
		
			
			
			
		
			
		
		
		});
        
        </script>
        
        
	</head>

	<body>
    
   
 
	

	  
    
      
    
    
    <div id="titulo">
	    
    </div>
    

    
    <div id="conteudo">
    
     <h1>Alterar Departamento</h1>
    
    <form name="form1" action="dep_alt_rec.php" method="post">
    
    	<input type="hidden" name="codigo" value="<?php echo $_POST["altcodigo"] ?>">
        
        <table>
        	
         
            <tr>
            	<td>
                	Departamento:
                </td>
                <td colspan="5">
                	<input type="text" maxlength="50" size="50" name="txtDepartamento"  value="<?php echo $nome ?>"  />
                    
                </td>
            </tr>
          
           
                
           
        </table>
        
        <hr>
        
        <input type="image" src="img/alterar.png" name="btAlterar" value="Alterar">
        <a href="principal.php"><img src="img/cancelar.png"</a>
    
    </form>
    
   
    </div>
    
    
  
	</body>
</html>
