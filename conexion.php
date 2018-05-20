<?php

$con = mysqli_connect("localhost","root","","prueba");
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
    else{
        $eli="DELETE FROM archivos WHERE fecha <= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
        mysqli_query($con,$eli);
    }

?>