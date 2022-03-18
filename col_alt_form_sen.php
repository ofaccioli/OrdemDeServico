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
		<title>Alterar</title>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
       
	   <?php
	
		
		
		
		
	
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
    
     <h1>Alterar Colaborador</h1>
    
    <form name="form1" action="col_alt_rec_sen.php" method="post">
    
    	
        
        <table>
        	
            <tr>
            	<td>
                	Usuario:
                </td>
                <td>
                	<select name="txtUser">
                    	
						<?php
							
							$sql = "select * from Colaborador";
							
							$query = mysqli_query($conexao, $sql);
							
							while($sql = mysqli_fetch_array($query)){
								
								//echo $sql['User'];
								
								//echo '<input type="hidden" name="codigo" value="'.$sql["Cod_colaborador"].'">';
								
								echo "
								
									<option value='".$sql['Cod_colaborador']."'>".$sql['User']."</option>
								
								";
								
								$cod_user = $sql['Cod_colaborador'];
							
							}
						?>
                    </select>
                </td>
            </tr>
          	<tr>
            	<td>
                	Senha
                </td>
                <td>
                	<input type="password" maxlength="15" size="15" name="txtSenha"/>
                </td>
            </tr>
           
                
           
        </table>
        
        <hr>
       
        <input type="image" src='img/alterar.png' name="btAlterar" value="Alterar">
        <a href="principal.php"><img src="img/cancelar.png"</a>
    
    </form>
    
   
    </div>
    
    
  
	</body>
</html>
