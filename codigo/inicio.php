<?php
        $nombre = ($_POST['username']);
        $con = $_POST['password'];
        $hashed = hash("MD5", $con);

        //Sacar Usuario y contraseña del Usuario
        $base = parse_ini_file("datos.ini");
        $php = new PDO($base["baseDeDatos"],$base["usuario"],$base["password"]);
        $con = $php->prepare("SELECT * from clientes where Nombre = ?");
		$con->execute([$nombre]);	
	    $resultado = $con->fetchAll(PDO::FETCH_COLUMN, 1);
        $resul = $con->fetchAll(PDO::FETCH_COLUMN, 2);
        $usuario = $resultado[0];  
        unset($con);

        $con = $php->prepare("SELECT * from clientes where Nombre = ?");
		$con->execute([$nombre]);	    
        $resul = $con->fetchAll(PDO::FETCH_COLUMN, 2);        
        $pass = $resul[0]; 

if(! ($_POST['username'] == $usuario && $hashed == $pass) )
    {
        Echo "<html>";
        Echo "<title>MUY mal</title>";
        Echo "<b>Acceso denegado</b>";        
        
    
    }
    else {
    
        ?><h1>Acceso concedido</h1><?php
    }
?>
