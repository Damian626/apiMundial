<?php 
    include '../conect.php';

    if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_mundiales_image = $conn->prepare("SELECT * FROM `mundiales` WHERE id = ?");
    $delete_mundiales_image->execute([$delete_id]);
    $fetch_delete_image = $delete_mundiales_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
    $delete_mundiales = $conn->prepare("DELETE FROM `mundiales` WHERE id = ?");
    $delete_mundiales->execute([$delete_id]);
    header('location:modificarMundial.php');
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="icon" href="/img/copa-mundial.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pompiere&display=swap" rel="stylesheet">

    <title>Modificar Mundiales</title>
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
        <a href="/menu/agregarMundial.php">
          Agregar Mundiales
        </a>
      </li>
    </ul>
  </div>
</nav>
    
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
   <div class="flex-btn">
      <a href="actualizarMundial.php?update=<?= $fetch_mundiales['id']; ?>" class="option-btn">actualizar</a>
      <a href="modificarMundial.php?delete=<?= $fetch_mundiales['id']; ?>" class="delete-btn" onclick="return confirm('¿Seguro que desea eliminar este producto?');">eliminar</a>
   </div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no hay mundiales agregados recientemente!</p>';
   }
?>

</div>

</section>
</body>
</html>