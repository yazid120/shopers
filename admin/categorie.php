<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <title>admin</title>
  <style>
    ion-icon{
      font-size: 2em;
    }
  </style>
</head>
<body>
 <?php include 'include/nav.php'; 
 if($connect){
 ?>
  <div class="container">
    <h2>list des categories </h2>
    <a href="ajouter_categorie.php" class="btn btn-primary">ajouter des categories</a>
    <?php
     require_once'./include/connection.php';
     $req = "SELECT * FROM categorie";
     $result = mysqli_query($connection,$req);
    
            ?>
     
  <table class="table table-success table-striped">
    <thead>
    <tr>
        <th>id</th>
        <th>liblle</th>
        <th>Description</th>
        <th>icon</th>
        <th>date creation</th>
        <th>option</th>
    </tr>
    </thead>
    <tbody>
    <?php
       if($result){
        while($elt = mysqli_fetch_array($result)){
            ?>
       <tr>
        <td><?php echo $elt['id_categorie'] ?></td>
        <td><?php echo $elt['libelle'] ?></td>
        <td><?php echo $elt['description'] ?></td>
        <td><?php echo $elt['icon'] ?></td>
        <td><?php echo $elt['date_creation'] ?></td>
        <td>
        <a href="modifier_categorie.php?id=<?php echo $elt['id_categorie'] ?>" class="btn btn-primary">modifier</a>
        <a href="supprimer_categorie.php?id=<?php echo $elt['id_categorie'] ?>" onclick="return confirm('voulez vraiment supprimer la categorie <?php echo $elt['libelle'] ?> ?')" class="btn btn-danger">supprimer</a>
        </td>
       </tr>
       <?php
        }
    }
    ?>
    </tbody>
</table>
  </div>
</body>
</html>
<?php }else{
    header('location: login.php');
 } ?>