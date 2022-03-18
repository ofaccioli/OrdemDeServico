<?php
		session_start();
		
		unset($_SESSION['login']);
		
		session_destroy();
		
	?>

<!DOCTYPE HTML>
<html>
<head><link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
	
    
    <center><img src="img/logo.png"></center>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
	<div id="tudo">
	    <center><h1>Voce está desconectado</h1> </center>
        <a href="index.php">Entrar</a>
	</div>

</body>
</html>