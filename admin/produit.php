
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <title>admin</title>
</head>
<body>
 <?php include 'include/nav.php'; 
   if($connect){
    ?>
  <div class="container">
    <h2>list des produits </h2>
    <a href="ajouter_produit.php" class="btn btn-primary">ajouter des produit</a>
    <?php
     require_once'./include/connection.php';
     $req = "SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie";
     $result = mysqli_query($connection,$req);
    
            ?>
     
  <table class="table table-success table-striped">
    <thead>
    <tr>
        <th>code produit</th>
        <th>liblle</th>
        <th>prix</th>
        <th>quantité de produit</th>
        <th>discount</th>
        <th>date creation</th>
        <th>categorie</th>
        <th>option</th>
    </tr>
    </thead>
    <tbody>
    <?php
       if($result){
        while($elt = mysqli_fetch_array($result)){
            ?>
       <tr>
        <td><?php echo $elt['id_produit'] ?></td>
        <td><?php echo $elt['libelle'] ?></td>
        <td><?php echo $elt['prix'] ?> DA</td>
        <td><?php echo $elt['qte'] ?></td>
        <td><?php echo $elt['discount'] ?> %</td>
        <td><?php echo $elt['date_creation'] ?></td>
        <td><?php echo $elt['categorie_libelle'] ?></td>
        <td>
        <a href="modifier_produit.php?id=<?php echo $elt['id_produit'] ?>" class="btn btn-primary">modifier</a>
        <a href="supprimer_produit.php?id=<?php echo $elt['id_produit'] ?>" onclick="return confirm('voulez vraiment supprimer le produit <?php echo $elt['libelle'] ?> ?')" class="btn btn-danger">supprimer</a>
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