!DOCTYPE html>
<html lang="es">
<head>
	<title>Netflix</title>
    
</head>
    
<body>
<?php
    
    //Datos del registro
    $renombre = ($_POST['reusername']);
    $reapellidos = ($_POST['reapellido']);
    $recont = ($_POST['repassword']);
    $reecont = ($_POST['reepassword']);
    $reemail = ($_POST['reemail']);
    $refecha = ($_POST['refecha']);
     
    $hashed = hash("MD5", $recont);
    //Sacar los usuarios de la BBDD
    $base = parse_ini_file("datos.ini");
    $php = new PDO($base["baseDeDatos"],$base["usuario"],$base["password"]);
    $con = $php->prepare("SELECT * from clientes where Nombre = ?");
	$con->execute([$renombre]);	
	$resultado = $con->fetchAll(PDO::FETCH_COLUMN, 1);
    $usuario = $resultado[0];
    
    //Contar la filas
    $con = $php->prepare("SELECT * from clientes");
	$con->execute();	
	$resultado = $con->fetchAll(PDO::FETCH_NUM);
    $contador = count($resultado); 
    $id = ($contador + 1); 

    //Registrar al usuario y meterlo en BBDD
    if ($usuario == $renombre)
    {
        echo "el usuario ya existe";
    }else{
            if ($reecont == $recont){
                echo "las contraseñas son iguales y creamos el usuario";
                	$con = $php->prepare("INSERT INTO clientes VALUES (:id,:nombre,:apellido,:cont,:email,:fecha);");
                    $con->bindParam(':id',$id);
                    $con->bindParam(':nombre',$renombre);
                    $con->bindParam(':apellido',$reapellidos);
                    $con->bindParam(':cont',$hashed);
                    $con->bindParam(':email',$reemail);
                    $con->bindParam(':fecha',$refecha);
                    $con->execute();
            }else {
                echo "las contraseñas no son iguales";
                header ("Location: http://localhost/tfg/registrarse.html");
            }
        
    }

?>    
        
 
</body>
</html>
