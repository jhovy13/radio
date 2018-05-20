<?php
session_start();
require('conexion.php');
if(!empty($_POST))
	{
    
    $usuario = mysqli_real_escape_string($con,$_POST['usuario']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $error = '';

$query = "SELECT tipo_user,id FROM usuarios WHERE username='$usuario' AND password='$password'";
$result = mysqli_query($con,$query);
//echo $result;
$row = mysqli_fetch_assoc($result);
if ($row["tipo_user"] == 'usuario') {
    $_SESSION['id_usuario'] = $row ['id'];
header("Location:usuario.php");
}
elseif ($row["tipo_user"] == 'administrador') {
    $_SESSION['id_usuario'] = $row['id'];
header("Location:admin.php");
}
else {
header("Location:error.php");
}

}
mysqli_close($con);
      
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/estilos.css" />
<link rel="icon" href="img/radio.ico">
</head>
<body>
		
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="login" class="login">
    <div class="contenedor-inputs">
    <img src="img/radio.ico" alt="" height="100" width="100" alinig="center">
    <input type="text" id="usuario" name="usuario" placeholder="Nombre de usuario" class="input-100" required>
    <input type="password" id="password" name="password" placeholder="Contraseña" class="input-100" required>
    <a href="recuperar_pass.php" style="color:black">Recuperar contraseña</a> <br>
    <br>
    <input type="submit" value="Iniciar Sesion" class="btn-enviar" required>       
    </div>
    </form>
		
		
		<br />
	</body>
</html>