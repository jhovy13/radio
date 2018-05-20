
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registro De Archivos</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
    session_start();
	require('conexion.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		$file = $_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 
 // new file size in KB
 $new_size = $file_size/1024;  
 
 $new_file_name = strtolower($file);
 // make file name in lower case
 
        $final_file=str_replace(' ','-',$new_file_name);
		$titulo = stripslashes($_REQUEST['titulo']);
		$titulo = mysqli_real_escape_string($con,$titulo);
		$fecha = stripslashes($_REQUEST['fecha']);
		$fecha = mysqli_real_escape_string($con,$fecha);
        
        
        $query = "INSERT INTO archivos (ida,audio, titulo, fecha,id) VALUES (NULL,'$final_file', '$titulo', '$fecha','".$_SESSION['id_usuario']."')";
        //$result = mysqli_query($con,$query);
        if(!mysqli_query($con,$query)){
            echo "Error Descripccion: " .mysqli_error($con);
        }
        else{
                header("location:usuario.php");
        }
    }else{
?>
<div class="form">
<p>id <?php echo $_SESSION['id_usuario'];?>!</p> 
<p><a href="logout.php">Logout</a></p>
<h1>Registro de Archivos</h1>
<form name="registration" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="file" id="file" name="file" placeholder="audio" required />
<input type="text" id="titulo" name="titulo" placeholder="titulo" required />
<input type="date" name="fecha" step="1" min="2018-01-01" max="2050-12-31" value="<?php echo date("Y-m-d");?>" required>

<input type="submit" name="submit" value="Registrar" />
</form>
</div>
<?php } ?>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>Titulo</strong></th>
<th><strong>Fecha</strong></th>
<th><strong>Usuario</strong></th>
<th><strong>Editar</strong></th>
<th><strong>Eliminar</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT archivos.ida,archivos.titulo,archivos.fecha,usuarios.username FROM usuarios inner join archivos on usuarios.id=archivos.id ORDER BY archivos.ida DESC";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["titulo"]; ?></td>
<td align="center"><?php echo $row["fecha"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><a href="ea.php?ida=<?php echo $row["ida"]; ?>">Edit</a></td>
<td align="center"><a href="dela.php?ida=<?php echo $row["ida"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table> 

</body>
    <script type="text/javascript">
    document.getElementById('file').onchange = function () {
    console.log(this.value);
    document.getElementById('titulo').value = document.getElementById('file').files[0].name.replace(/\.[^/.]+$/, '');
}
    
    </script>
</html>
