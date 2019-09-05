<?php
   include("db.php");
   if(isset($_POST["save_task"])){
      // echo "Guardando";
      $titulo = $_POST["title"];
      $descripcion = $_POST["description"];

      $consulta = "INSERT INTO task(title, description) VALUES ('$titulo', '$descripcion')";

      $result = mysqli_query($conn, $consulta);

      if(!$result){
         die("Consulta Fallida");
      }

      $_SESSION["message"] = "Tarea guardada";
      $_SESSION["message_type"] = "success";
      header("Location: index.php");
   }

