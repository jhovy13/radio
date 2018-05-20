<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro De Usuarios</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
    session_start();
    require('conexion.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
        $tipo=stripslashes($_REQUEST['tipo']);
        $tipo=mysqli_real_escape_string($con,$tipo);
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

        $query = "INSERT into usuarios (id,tipo_user,username, email, password) VALUES (NULL,'".$_POST['tipo']."','$username', '$email', '$password')";
        $result = mysqli_query($con,$query);
        if($result){
            //echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
            header("Location:admin.php");
        }
    }else{
?>
<div class="form">
<p>id <?php echo $_SESSION['id_usuario'];?>!</p> 
<p><a href="logout.php">Cerrar Sesion</a></p>
<h1>Registro de Usuarios</h1>
<form name="registration" action="" method="post">
<label for="tipo">Tipo de usuario</label>
<select name="tipo">
<option value="Administrador">Administrador</option>
<option value="Usuario">Usuario</option>
</select>
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
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
