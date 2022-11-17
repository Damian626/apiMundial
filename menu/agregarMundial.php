<?php 
    include '../conect.php';

    if(isset($_POST['agregar'])){

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $fecha= $_POST['fecha'];
        $fecha = filter_var($fecha, FILTER_SANITIZE_STRING);
        $ganador = $_POST['ganador'];
        $ganador = filter_var($ganador, FILTER_SANITIZE_STRING);
     
        $image_01 = $_FILES['image_01']['name'];
        $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
        $image_size_01 = $_FILES['image_01']['size'];
        $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
        $image_folder_01 = '../uploaded_img/'.$image_01;
     
     
     
        $select_mundiales = $conn->prepare("SELECT * FROM `mundiales` WHERE fecha = ?");
        $select_mundiales->execute([$fecha]);
     
        if($select_mundiales->rowCount() > 0){
           echo '<p class="empty">error ya existe un mundial en esta fecha</p>';
            
        }else{
     
           $insert_mundiales = $conn->prepare("INSERT INTO `mundiales`(name, ganador, fecha, image_01) VALUES(?,?,?,?)");
           $insert_mundiales->execute([$name, $ganador, $fecha, $image_01]);
     
           if($insert_mundiales){
              if($image_size_01 > 2000000){
               echo '<p class="empty">error imagen demasiado grande/p>';
                 

              }else{
                 move_uploaded_file($image_tmp_name_01, $image_folder_01);
                 echo '<p class="empty">Nuevo mundial agregado</p>';
              }
     
           }
     
        }  
     
     };
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/copa-mundial.png">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Pompiere&display=swap" rel="stylesheet">
    <title>Agregar Mundial</title>
</head>
<body>
    
<nav class="menu-container">
  <!-- burger menu -->
  <input type="checkbox" aria-label="Toggle menu" />
  <span></span>
  <span></span>
  <span></span>

  <!-- logo -->
  <a href="../index.php" class="menu-logo">
    <img src="/img/copa.png" alt="Mundiales"/>
  </a>

  <!-- menu items -->
  <div class="menu">
    <ul>
    </ul>
    <ul>
      <li>
        <a href="../index.php">
          Inicio
        </a>
      </li>
      <li>
        <a href="/menu/modificarMundial.php">
          Modificar Mundiales
        </a>
      </li>
    </ul>
  </div>
</nav>
<section class="añedir-mundiales">

<h1 class="heading">Agregar Mundial</h1>

<form action="" method="post" enctype="multipart/form-data">
   <div class="flex">
      <div class="input-caja">
         <span>Sede (requerido)</span>
         <input type="text" class="caja" required maxlength="100" placeholder="ingrese el nombre del pais sede" name="name">
      </div>
      <div class="input-caja">
         <span>Año del mundial(requerido)</span>
         <input type="number" min="1930" class="caja" required max="9999999999" placeholder="ingrese el año del mundial" onkeypress="if(this.value.length == 10) return false;" name="fecha">
      </div>
     <div class="input-caja">
         <span>iBandera de la sede(requerida)</span>
         <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="caja" required>
     </div>
     <div class="input-caja">
         <span>Ganador del Mundial(requerido)</span>
         <input type="text" class="caja" required maxlength="100" placeholder="ingrese el Ganador del Mundial" name="ganador">
      </div>
   </div>
   
   </div>
   
   <input type="submit" value="agregar" class="btn" name="agregar">
</form>

</section>


<section class="ver-mundiales">

<h1 class="heading">Mundiales Agregados</h1>

<div class="caja-container">

<?php
   $select_mundiales = $conn->prepare("SELECT * FROM `mundiales`");
   $select_mundiales->execute();
   if($select_mundiales->rowCount() > 0){
      while($fetch_mundiales = $select_mundiales->fetch(PDO::FETCH_ASSOC)){ 
?>
<div class="caja">
   <img src="../uploaded_img/<?= $fetch_mundiales['image_01']; ?>" alt="">
   <div class="nombre">Pais sede:<?= $fetch_mundiales['name']; ?></div>
   <div class="fecha">Año del Mundial:<span><?= $fetch_mundiales['fecha']; ?></span></div>
   <div class="ganador">Ganador del Mundial:<span><?= $fetch_mundiales['ganador']; ?></span></div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no hay mundiales agregados recientemente!</p>';
   }
?>

</div>

</section>




    <script src="./script.js"></script>
</body>
</html>