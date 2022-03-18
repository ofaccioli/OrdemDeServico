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
		<title>Consultar Setores</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        
        
        <script>
			
					
			
			
			
			
			$(document).ready(function(){
			
			
			});
			
		</script>
        
        
	</head>
    
    

	<body>
    	
        <div id="conteudo">
        
	    	<h1>Consultar Setores</h1>
 			
            <br>
                   
    	   
            
            <br>
            
            <hr>
            
            
            <?php
			
				$sql= "select * from setor order by Nome_setor";
				
				$query = mysqli_query($conexao, $sql);
				
				echo "<form action='set_alt_form.php' method='post' id='form'>";
				
				echo "<table class='tbget'>";
		
	echo "
		
		
		
		<tr>
			<th>
				Setor
			</th>
			
			
		</tr>
		
		";
	
	while($sql = mysqli_fetch_array($query)){
		
		
		
		echo "
		
			<tr>
				
				<td>
					".$sql['Nome_setor']."
				</td>
				
				
			</tr>
		
		";
		
			
	}
	
	echo "</table>";
	
	echo "<br>";
	
	echo "<input type='hidden' name='altcodigo' id='altcodigo'>";
	
	echo "</form>";
				
			
			?>
            
            
            
            <div id="tbReq">
            </div>
			
           
		
    	</div>
	</body>
</html>