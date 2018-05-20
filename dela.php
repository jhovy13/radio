<?php
require('conexion.php');
$ida=$_REQUEST['ida'];
$query = "DELETE FROM archivos WHERE ida=$ida"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: usuario.php"); 
?>


<!--delete * from archivos where fecha between <fecha del sistema> -7, <fecha del sistema>-->