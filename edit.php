<?php include("includes/header.php")?>

<?php include("db.php")?>

<?php

if (isset($_GET['id'])) {
    $id= $_GET['id'];
    $consulta= "select  * from task where id=$id";

    $resultado= mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) ==1) {
        $row= mysqli_fetch_array($resultado);
        $title =$row['title'];
        $description= $row['description'];
    }
}

?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Ingresa el titulo" required=true autofocus value="<?php echo $title ?>" > 
                    </div>
                    <div class="form-group">
                        <textarea name="description"  rows="2" class="form-control" placeholder="Ingresa la descripción" required=true value="" > <?php echo $description ?> </textarea>
                    </div>
                   <!-- <input type="submit" class="btn btn-success btn-block" name="guardar" value="Agregar" > -->
                    <button class="btn btn-success" name="update" > Actualizar </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['update'])) {
        $id= $_GET['id'];
        $title= $_POST['title'];
        $description= $_POST['description'];
    
        $consulta= "update task set title='$title', description='$description'  where id='$id' ";
    
       $resultado= mysqli_query($conn, $consulta); 
    
       if (!$resultado) {
           die("No se pudo editar la tarea");
       }
    
       $_SESSION['message']='Tarea editada correctamente';
       $_SESSION['message_type']='warning';
    
       //para redireccionar 
       header("Location: index.php" );
    }
?>

<?php include("includes/footer.php")?>


