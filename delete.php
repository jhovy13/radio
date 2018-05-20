<?php
require('conexion.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM usuarios WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php"); 
?>