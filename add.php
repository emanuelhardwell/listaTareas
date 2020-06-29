<?php
include("db.php");

if (isset($_POST['guardar'])) {
    $title= $_POST['title'];
    $description= $_POST['description'];

    $consulta= "insert into task (title, description) values ('$title', '$description')";

   $resultado= mysqli_query($conn, $consulta); 

   if (!$resultado) {
       die("No se pudo agregar la tarea");
   }

   $_SESSION['message']='Tarea guardada satisfactoriamente';
   $_SESSION['message_type']='success';

   //para redireccionar 
   header("Location: index.php" );
}


?>