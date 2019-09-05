<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4">
   <div class="row">
      <div class="col-md-4">
         <?php if(isset($_SESSION["message"])){ ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
               <?= $_SESSION["message"]; ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php session_unset(); } ?>
         <div class="card">
            <div class="card-body">
               <form action="save_task.php" method="POST">
                  <div class="form-group">
                     <input type="text" name="title" class="form-control" placeholder="Titulo de Tarea" autofocus>
                  </div>
                  <div class="form-group">
                     <textarea name="description"  rows="2" class="form-control" placeholder="Descripción de la Tarea"></textarea>
                  </div>
                  <input type="submit" value="Guardar Tarea" class="btn btn-success btn-block" name="save_task">
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Titulo</th>
                  <th>Descripcion</th>
                  <th>Fecha de creación</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $consulta = "SELECT * FROM task";
                  $resultado = mysqli_query($conn, $consulta);

                  while($fila = mysqli_fetch_array($resultado)){ ?>
                  <tr>
                     <td><?php echo $fila["title"]; ?></td>
                     <td><?php echo $fila["description"]; ?></td>
                     <td><?php echo $fila["created_at"]; ?></td>
                     <td>
                        <a href="edit.php?id=<?= $fila['id']; ?>" class="btn btn-secondary">
                           <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_task.php?id=<?= $fila['id']; ?>" class="btn btn-danger">
                           <i class="far fa-trash-alt"></i>
                        </a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

      

<?php include("includes/footer.php"); ?>