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
		<title>Excluir Setor</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        
        
        <script>
			
			
			function ck(){
			
				 if (document.getElementById("todos").checked == true){
      				$('.marcar').each(
         				function(){
            				
							$(this).attr("checked", true);
         				}
     				 );
   				}else{
     				 $('.marcar').each(
         				function(){
           					 
							 $(this).attr("checked", false);
         				}
      				 );
   				}
			
			}
			
			$(document).ready(function(){
			
				
			
			});
			
		</script>
        
        
	</head>
    
    

	<body>
    	
        <div id="conteudo">
        
	    	<h1>Excluir Setor</h1>
 			
            <br>
                   
    	   
            
            <br>
            
            <hr>
            
            
            <?php
			
				$sql= "select * from setor order by Nome_setor";
				
				$query = mysqli_query($conexao, $sql);
				
				echo "<form action='set_exc_rec.php' method='post'>";
				
				echo "<table class='tbget'>";
		
	echo "
		
		
		
		<tr>
			<th>
				<input type='checkbox' name='todos' id='todos' value='todos'   onClick='ck()' >
			</th>
			<th>
				Setor
			</th>
		
			
		</tr>
		
		";
	
	while($sql = mysqli_fetch_array($query)){
		
		
		
		echo "
		
			<tr>
				<td>
					<input type='checkbox' name='selset[]' class='marcar' value='".$sql['Cod_setor']."'>
				</td>
				<td>
					".$sql['Nome_setor']."
				</td>
				
			</tr>
		
		";
		
			
	}
	
	echo "</table>";
	
	echo "<br>";
	
	echo "<input type='image' src='img/excluir.png' value='Deletar' name='btDelete'>";
	
	echo '<a href="principal.php"><img src="img/cancelar.png"</a>';
	
	echo "</form>";
				
			
			?>
            
            
            
            <div id="tbReq">
            </div>
		
		
    	</div>
	</body>
</html>