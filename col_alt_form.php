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
	
		$_SESSION["Cod_col"] = $_POST["altcodigo"];
		
		$sql = "select c.*, d.Nome_departamento, d.Cod_departamento from Departamento d inner join Colaborador c on c.Cod_departamento = d.Cod_departamento where c.Cod_colaborador = ".$_POST["altcodigo"];
		
		
		
		$query = mysqli_query($conexao, $sql);
		
		while($sql = mysqli_fetch_array($query)){
			
			
			$nome = $sql['Nome_colaborador'];
			$cod_departamento = $sql['Cod_departamento'];
			$departamento = $sql['Nome_departamento'];
			$perfil = $sql['Perfil'];
			$cod = $sql["Cod_colaborador"];
			$user = $sql["User"];
			
			if($sql['Perfil'] == 0){
				$perfilName = "Sim";
			}else{
				$perfilName = "Não";
			}
		 	
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
    
     <h1>Alterar Colaborador</h1>
    
    <form name="form1" action="col_alt_rec.php" method="post">
    
    	<input type="hidden" name="codigo" value="<?php echo $_POST["altcodigo"] ?>">
        
        <table>
    
           <tr>
            	<td>
                	Colaborador:
                </td>
                <td>
                	<input type="text" maxlength="50" size="50" name="txtColaborador" value="<?php echo $nome ?>"/>
                </td>
            </tr> 
            <tr>
            	<td>
                	Departamento:
                </td>
                <td>
                	<select name="txtDepartamento">
						<option value="<?php echo $cod_departamento ?>"><?php echo $departamento ?></option>
						<?php
							
							$sql_dep = "select * from Departamento";
							
							$query_dep = mysqli_query($conexao, $sql_dep);
							
							while($sql_dep = mysqli_fetch_array($query_dep)){
							
								echo "
								
									<option value='".$sql_dep['Cod_departamento']."'>".$sql_dep['Nome_departamento']."</option>
								
								";
							
							}
						?>
                    </select>
                </td>
            </tr>   
            <tr>
            	<td>
                	Admin:
                </td>
                <td>
                	<select name="txtPerfil">
						<option value="<?php echo $perfil ?>"><?php echo $perfilName ?></option>
                        <option value="1">Não</option>
                        <option value="0">Sim</option>
                        
                    </select>
                </td>
            </tr>
          	<tr>
            	<td>
                	Usuário::
                </td>
                <td>
                	<input type="text" maxlength="20" size="20" name="txtUser" value="<?php echo $user ?>"/>
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
