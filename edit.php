<?php
   include("db.php");
   if(isset($_GET["id"])){
      $i = $_GET["id"];

      $consulta = "SELECT * FROM task WHERE id = $i";
      $resultado = mysqli_query($conn, $consulta);

      if(mysqli_num_rows($resultado) == 1){
         // echo "Puedes editar";
         $row = mysqli_fetch_array($resultado);
         // echo print_r(json_encode($row));
         $title = $row["title"];
         $description = $row["description"];
         // echo $title;
      }
   }
   if(isset($_POST["actualizar"])){
      $id = $_GET["id"];
      $titulo = $_POST["titulo"];
      $descripcion = $_POST["descripcion"];

      $consulta = "UPDATE task set title = '$titulo', description = '$descripcion' WHERE id = $id";
      $resultado = mysqli_query($conn, $consulta);


      $_SESSION["message"] = "Tarea con el id ".$id." actualizada";
      $_SESSION["message_type"] = "info";

      header("Location: index.php");
   }
?>

<?php include("includes/header.php") ?>

   <div class="container p-4">
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="card">
               <div class="card-body">
                  <form action="ediT.php?id=<?= $_GET['id']; ?>" method="POST">
                     <div class="form-group">
                        <input type="text" name="titulo" value="<?= $title; ?>" class="form-control" placeholder="Actualiza el titulo">
                     </div>
                     <div class="form-group">
                        <textarea name="descripcion" class="form-control" placeholder="Actualiza descripcion"><?= $description ?></textarea>
                     </div>
                     <input type="submit" class="btn btn-success" name="actualizar">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php include("includes/footer.php") ?>