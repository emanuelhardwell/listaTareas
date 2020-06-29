<?php include('db.php'); ?>

<?php include('includes/header.php'); ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Ingresa el titulo" autofocus  > 
                    </div>
                    <div class="form-group">
                        <textarea name="description"  rows="2" class="form-control" placeholder="Ingresa la descripción" ></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Agregar" >
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $consulta= "select * from task";
                        $resultado= mysqli_query($conn, $consulta);
                        while ($row =mysqli_fetch_array($resultado)) {     ?>
                           <tr>
                               <td>
                                  <?php echo $row['title'];     ?>
                               </td>
                               <td>
                                  <?php echo $row['description'];     ?>
                               </td>
                               <td>
                                  <?php echo $row['created_date'];     ?>
                               </td>
                               <td>
                                   <a href="edit.php?id= <?php echo $row['id']  ?> "> Editar </a>
                                   <a href="delete.php?id= <?php echo $row['id']  ?> "> Eliminar </a>
                               </td>
                           </tr>
                       
                    <?php  } ?>
                </tbody>
                
            </table>
        </div>
    </div>
</div>





<?php include('includes/footer.php'); ?>