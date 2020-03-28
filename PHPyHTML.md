# Tareas 

- Si da un error volver al html
- Todos los echo los tengo que meter en alert
- hasear las contraseñas ¿haseo todos los datos?
- mirar los directos
- ¿Se puede tener varios php?
# Base de datos 
| id | Nombre | Apellido | Contraseña | Correo | fecha de nacimiento|
# Login
## Html 
```html
<center>
<form action="login.php" method="post">
<label>Nombre del Usuario :</label>
<input id="name" name="username" placeholder="Nombre" type="text" ppattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,48}" required>
<br>
<label>Contraseña :</label>
<input id="password" name="password" placeholder="**********" type="password" pattern="[A-Za-z0-9]{8,12}" required>
<br>
<a href="registrarse.html">Resgistrate aqui </a>
<input name="submit" type="submit" value="Login ">
</form></center>
```
## Php 
```php
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

if(! ($_POST['username'] == $usuario && $con == $pass) )
    {
        Echo "<html>";
        Echo "<title>MUY mal</title>";
        Echo "<b>Acceso denegado</b>";        
        
    
    }
    else {
    
        ?><h1>Acceso concedido</h1><?php
    }
?>
```
# Registro
## Html

```html 
<center>
<form action="registro.php" method="post">
<label>Nombre del Usuario :</label>
<input id="name" name="reusername" placeholder="Nombre" type="text" ppattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,48}" required>
<label>Apellidos :</label>
<input id="name" name="reapellido" placeholder="Apellido" type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]2,64}" required>
<br>
<label>Contraseña :</label>
<input id="password" name="repassword" placeholder="**********" type="password" pattern="[A-Za-z0-9]{8,12}" required>
<br>
<label>Vuelva a escribir la contraseña</label>
<input id="password" name="reepassword" placeholder="**********" type="password" pattern="[A-Za-z0-9]{8,12}" required>
<br>
<label>Correo electronico :</label>
<input id="name" name="reemail" placeholder="ejemplo@ejemplo.com" type="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/>
<br>
<label>Fecha de nacimiento :</label>
<input id="name" name="refecha" placeholder="ejemplo@ejemplo.com" type="date" >
<br>

<input name="submit" type="submit" value="Login ">
</form></center>
```
## Php
```php
<!DOCTYPE html>
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
                    $con->bindParam(':cont',$recont);
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
```

