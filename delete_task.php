<?php
include("db.php");


if(isset($_GET["id"])){
   $i = $_GET["id"];
   $consulta = "DELETE FROM task WHERE id = $i";

   $resultado = mysqli_query($conn, $consulta);

   if(!$resultado){
      die("Consulta de Eliminacion fallida");
   }

   $_SESSION["message"] = "Tarea eliminada";
   $_SESSION["message_type"] = "danger";
   header("Location: index.php");
}
