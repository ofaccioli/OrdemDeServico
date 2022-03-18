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
		<title>Consultar Colaboradores</title>
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
        
	    	<h1>Consultar Colaboradores</h1>
 			
            <br>
                       <a href='principal.php'><img class='voltar' src='img/voltar.png'></a></h1>     
    	   
            
            <br>
            
            <hr>
            
            
            <?php
			
				$sql= "select c.Cod_colaborador, c.Nome_colaborador, d.Nome_departamento, c.Perfil from Departamento d inner join Colaborador c on c.Cod_departamento = d.Cod_departamento order by c.Nome_colaborador";
				
				$query = mysqli_query($conexao, $sql);
				
				echo "<form  id='form'>";
				
				echo "<table class='tbget'>";
		
	echo "
		
		
		
		<tr>
			
			<th>
				Colaborador
			</th>
			<th>
				Departamento
			</th>
			<th>
				Admin
			</th>
			
			
		</tr>
		
		";
	
	while($sql = mysqli_fetch_array($query)){
		
		if($sql['Perfil'] == 0){
			$perfil = "S";
		}else{
			$perfil = "N";
		}
		
		
		echo "
		
			<tr>
				
				
				<td>
					".$sql['Nome_colaborador']."
				</td>
				<td>
					".$sql['Nome_departamento']."
				</td>
				<td>
					".$perfil."
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