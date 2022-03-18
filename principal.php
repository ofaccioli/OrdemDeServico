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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
		<title>Home</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  
  <script>
  
  
  
  $(function() {
    $( "#accordion" ).accordion({
      event: "click hoverintent"
    });
  });
 
  /*
   * hoverIntent | Copyright 2011 Brian Cherne
   * http://cherne.net/brian/resources/jquery.hoverIntent.html
   * modified by the jQuery UI team
   */
  $.event.special.hoverintent = {
    setup: function() {
      $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = $( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;
 
      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };
 
      function clear() {
        target
          .unbind( "mousemove", track )
          .unbind( "mouseout", clear );
        clearTimeout( timeout );
      }
 
      function handler() {
        var prop,
          orig = event;
 
        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();
 
          event = $.Event( "hoverintent" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;
 
          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }
 
      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };
  </script>
	</head>

	<body >

		<header>
        
        	<center><img src="img/logo2.png"></center>
            
            <br>
            <br>
            <br>
        
			<?php
			
				
				
				$sql = "select * from colaborador where Cod_colaborador = '".$_SESSION["Cod_colaborador"]."'";
			
				$query = mysqli_query($conexao, $sql);
			
				while($sql = mysqli_fetch_array($query)){
				
					$_SESSION["Cod_colaborador"] = $sql["Cod_colaborador"];
					
					if($_SESSION["admin"] == true){	
						echo "<h1>Bem-vindo, ".$sql["Nome_colaborador"]." (Administrador) <a href='logout.php'><img class='sair' src='img/sair.png'></a></h1>";
					}else{
						echo "<h1>Bem-vindo, ".$sql["Nome_colaborador"]." <a href='logout.php'><img class='sair' src='img/sair.png'></a></h1>";
					}
				
				}
			?>
            
           
            <br>
            
            
        </header>
        
        <div id="conteudo">
        	
            
			
			
			
			<div id="accordion">
			
			<?php
			
				if($_SESSION["admin"] == true){	
	        		
					echo '
					
					<h3><img src="img/col.png"> &nbsp Colaboradores</h3>
  					<div>
   						<p>
					
							<table class="tbprincipal">
								<tr>
									<td valign="center"><a href="col_alt.php"><img src="img/alterar_0.png">&nbsp;Alterar</a></td>
									<td valign="center">|</td>
									
									<td valign="center"><a href="col_cad.php"><img src="img/cadastrar_0.png">&nbsp;Cadastrar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="col_con.php"><img src="img/consultar_0.png">&nbsp;Consultar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="col_exc.php"><img src="img/delete_0.png">&nbsp;Excluir</a></td>
								</tr>
								<tr>
									<td colspan="7">
										<hr>
									</td>
								</tr>
								<tr>
									<td valign="middle" colspan="7"><a href="col_alt_form_sen.php"><img src="img/alterar_0.png">&nbsp;Alterar Senha</a></td>
								</tr>
								
							</table>
							
							
							
					
						</p>
  					</div>
					<h3><img src="img/dep.png"> &nbsp &nbsp Departamentos</h3>
					<div>
   						<p>
					
							<table class="tbprincipal">
								<tr>
									<td valign="center"><a href="dep_alt.php"><img src="img/alterar_0.png">&nbsp;Alterar</a></td>
									<td valign="center">|</td>
									
									<td valign="center"><a href="dep_cad.php"><img src="img/cadastrar_0.png">&nbsp;Cadastrar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="dep_con.php"><img src="img/consultar_0.png">&nbsp;Consultar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="dep_exc.php"><img src="img/delete_0.png">&nbsp;Excluir</a></td>
								</tr>
								
								
							</table>
					
						</p>
  					</div>
					<h3><img src="img/emp.png"> &nbsp Setores</h3>
					<div>
   						<p>
					
							<table class="tbprincipal">
								<tr>
									<td valign="center"><a href="set_alt.php"><img src="img/alterar_0.png">&nbsp;Alterar</a></td>
									<td valign="center">|</td>
									
									<td valign="center"><a href="set_cad.php"><img src="img/cadastrar_0.png">&nbsp;Cadastrar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="set_con.php"><img src="img/consultar_0.png">&nbsp;Consultar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="set_exc.php"><img src="img/delete_0.png">&nbsp;Excluir</a></td>
								</tr>
								
								
							</table>
					
						</p>
  					</div>
					<h3><img src="img/req.png"> &nbsp Ordem de Serviços</h3>
					<div>
   						<p>
					
							<table class="tbprincipal">
								<tr>
									<td valign="center"><a href="os_alt.php"><img src="img/alterar_0.png">&nbsp;Alterar</a></td>
									<td valign="center">|</td>
									
									<td valign="center"><a href="os_cad.php"><img src="img/cadastrar_0.png">&nbsp;Cadastrar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="os_con.php"><img src="img/consultar_0.png">&nbsp;Consultar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="os_exc.php"><img src="img/delete_0.png">&nbsp;Excluir</a></td>
								</tr>
								<tr>
									<td colspan="9"><hr></td>
								</tr>
								<tr>
									<td valign="middle"><a href="excel.php"><img src="img/excel_0.png">&nbsp;Excel</a></td>
								</tr>
								
							</table>
							
							
					
						</p>
  					</div>
    	    		';
				
				}else{
					
					echo '
					<h3>Ordem de Serviços</h3>
					<div>
   						<p>
					
							<table class="tbprincipal">
								<tr>
									<td valign="center"><a href="os_alt.php"><img src="img/alterar_0.png">&nbsp;Alterar</a></td>
									<td valign="center">|</td>
									<td valign="center"><a href="os_cad.php"><img src="img/cadastrar_0.png">&nbsp;Cadastrar</a></td>
									<td valign="middle">|</td>
									<td valign="middle"><a href="os_con.php"><img src="img/consultar_0.png">&nbsp;Consultar</a></td>
																		
								</tr>
								
								
							</table>
					
						</p>
  					</div>
    	    		';
					
				}
			?>
        </div>
        
        
        
        </div>

	</body>
</html>