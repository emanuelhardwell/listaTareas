<?php 

include("db.php");

if (isset($_GET['id'])) {
    $id= $_GET['id'];

    $consulta= "delete from task where id='$id'";
    $resultado= mysqli_query($conn, $consulta);

    if (!$resultado) {
        die("No se pudo eliminar la tarea");
    }
    
    $_SESSION['message']='Se ha eliminado correctamente';
    $_SESSION['message_type']='danger';

     //para redireccionar 
   header("Location: index.php" );
}

?>