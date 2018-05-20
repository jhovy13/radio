<?php
$con = mysqli_connect("localhost","root","","prueba");
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Non-Responsive Table</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

<table>
  <caption>Usuarios Registrados</caption>
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tipo De Usuario</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   <?php
$sel_query="Select * from usuarios;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td data-label="Id"><?php echo $row["id"]; ?></td>
      <td data-label="Tipo de Usuario"><?php echo $row["tipo_user"]; ?></td>
      <td data-label="Usuario"><?php echo $row["username"]; ?></td>
      <td data-label="Correo"><?php echo $row["email"]; ?></td>
      <td data-label="Contraseña"><?php echo $row["password"]; ?></td>
      <td data-label=""><a href="editu.php?id=<?php echo $row["id"]; ?>">Editar</a></td>
      <td data-label=""><a href="delete.php?id=<?php echo $row["id"]; ?>">Eliminar</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    		
</body>

</html>