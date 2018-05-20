<?php
if(!empty($_POST)){
$destino="jhoby13@gmail.com";
$usuario=$_POST["usuario"];
$correo=$_POST["correo"];
$contenido="El usuario: ".$usuario." quiere recuperar su contraseña.\n Con el Correo:".$correo;  

if(mail($destino,"Recuperar contraseña",$contenido)){
    echo "Correo De recuperacion enviado";
}else{
    echo "El correo no se puede enviar";
}    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>
    <link rel="stylesheet" href="css/email.css">
</head>
<body>
    <form action="" method="post">
        <h2>RECUPERAR CONTRASEÑA</h2>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="email" name="correo" placeholder="Email" required>
        <input type="submit" value="Enviar" id="boton">
    </form>
</body>
</html>