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
		<title>Cadastrar Colaboradores</title>
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
   
    
	<h1>Cadastro de Colaboradores</h1>
    
    <form method="post" action="col_cad_rec.php">
    
    	
        <table >
        	<tr>
            	<td>
                	Colaborador:
                </td>
                <td>
                	<input type="text" maxlength="50" size="50" name="txtColaborador" />
                </td>
            </tr> 
            <tr>
            	<td>
                	Departamento:
                </td>
                <td>
                	<select name="txtDepartamento">
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
						
                        <option value="1">Não</option>
                        <option value="0">Sim</option>
                        
                    </select>
                </td>
            </tr>
            <tr>
            	<td>
                	Usuário:
                </td>
                <td>
                	<input class="maiuscula" type="text" maxlength="20" size="20" name="txtUser" />
                      
                </td>
            </tr>  
            <tr>
            	<td>
                	Senha:
                </td>
                <td>
                	<input type="password" maxlength="15" size="15" name="txtSenha" />
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