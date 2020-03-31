# Tareas 

- Todos los echo los tengo que meter en alert
- hasear las contraseñas ¿haseo todos los datos?
- ¿Se puede tener varios php?
- Sacar un valor de un intput y meterlo en un php (creo que es por js)
- Cuadrar todos los datos de los usuarios y series 
- Poner Url bonitas o Hasearlas 
- 
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
##Estrellas
```html
<head><LINK REL=StyleSheet HREF="estilos.css" TYPE="text/css" MEDIA=screen></head>
<h1>Pure CSS Star Rating Widget</h1>
<form action="prueba.php" method="post">
    <fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4,5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3,5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2,5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1,5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="0,5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
    </fieldset>
    </form>
```
```css
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
```
## Directo 
```html

<video  width="640" height="480" controls>
 <source src="aitana.mp4" type="video/mp4">
</video>

```
