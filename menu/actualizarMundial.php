<?php
   include '../conect.php';

   if(isset($_POST['update'])){

      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $fecha = $_POST['fecha'];
      $fecha = filter_var($fecha, FILTER_SANITIZE_STRING);
      $ganador = $_POST['ganador'];
      $ganador = filter_var($ganador, FILTER_SANITIZE_STRING);
   
      $update_mundiales = $conn->prepare("UPDATE `mundiales` SET name = ?, fecha = ?, ganador = ? WHERE id = ?");
      $update_mundiales->execute([$name, $fecha, $ganador, $pid]);
   
      echo '<p class="empty">Mundial actualizado</p>';
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="../img/copa-mundial.png">
   <link rel="stylesheet" href="../style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Pompiere&display=swap" rel="stylesheet">
   <title>Actualizar Mundial</title>
</head>
<body>
<section class="actualizar-mundial ">

<h1 class="heading">Actualizar Mundial<h1>

<?php
   $update_id = $_GET['update'];
   $select_mundiales = $conn->prepare("SELECT * FROM `mundiales` WHERE id = ?");
   $select_mundiales->execute([$update_id]);
   if($select_mundiales->rowCount() > 0){
      while($fetch_mundiales = $select_mundiales->fetch(PDO::FETCH_ASSOC)){ 
?>
<form action="" method="post" enctype="multipart/form-data">
   <input type="hidden" name="pid" value="<?= $fetch_mundiales['id']; ?>">
   <input type="hidden" name="old_image_01" value="<?= $fetch_mundiales['image_01']; ?>">
   <div class="imagen-container">
      <div class="imagen-main">
         <img src="../uploaded_img/<?= $fetch_mundiales['image_01']; ?>" alt="">
      </div>
   </div>
   <span>Actualizar Nombre de la Sede</span>
   <input type="text" name="name" required class="caja" maxlength="100" placeholder="ingrese el nombre del pais sede" value="<?= $fetch_mundiales['name']; ?>">
   <span>Actualizar Año del Mundial</span>
   <input type="number" name="fecha" required class="caja" min="1930" max="9999999999" placeholder="ingrese el año del mundial" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_mundiales['fecha']; ?>">
   <span>Actualizar Ganador del Mundial</span>
   <input type="text" name="ganador" required class="caja" maxlength="100" placeholder="ingrese el Ganador del Mundial" value="<?= $fetch_mundiales['ganador']; ?>">
      <input type="submit" name="update" class="btn" value="Actualizar Mundial">
      <a href="agregarMundial.php" class="option-btn">Volver atras</a>
   </div>
</form>

<?php
      }
   }else{
      echo '<p class="empty">No hay mundiales agreados</p>';
   }
?>

</section>
</body>
</html>