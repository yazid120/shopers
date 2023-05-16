<?php session_start() ;
     $connect = false;
     if(isset($_SESSION['admin'])){
      $connect = true;
     }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
      if($connect){
    require_once "./include/connection.php";
   
    $sql = "SELECT * FROM categorie ";
    $result = mysqli_query($connection,$sql);

    
     ?>
    <div class="container py-2">
    <h4 style="margin-top:7px; text-align: center;">modifier produit</h4>
    <?php
    $id_produit = $_GET['id'];
    $rem = "SELECT * FROM produit WHERE id_produit = '$id_produit';  ";
     $rel = mysqli_query($connection,$rem);
     if($rem){
     if(isset($_POST['modifier'])){
       $code_product = $_POST['id_produit'];
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $qte = $_POST['qte'];
        $date = date('y-m-d');
        $id_categorie = $_POST['categorie'];
        if(!empty($code_product) && !empty($libelle) && !empty($prix)  && !empty($id_categorie) &&!empty($qte)){
           $sqli = "UPDATE produit SET id_produit = '$code_product',qte = '$qte', libelle = '$libelle', prix = '$prix', discount = '$discount' , date_creation ='$date', id_categorie = '$id_categorie' WHERE id_produit = '$id_produit';";
            $insert = mysqli_query($connection,$sqli);
            if($insert){
                ?>
                <div class="alert alert-success" role="alert">
                  le produit <?php echo $libelle  ?> a été bien modifier !
                </div>
                <?php
                
                header('location: produit.php');
            }
            else{
                ?>
                <div class="alert alert-danger" role="alert">
                  error !!
                </div>
                <?php
            }
        }else{
            ?>
      <div class="alert alert-danger" role="alert">
        les champs modification  sont vide !
      </div>
      <?php
        }
     } 
     while($elt = mysqli_fetch_array($rel)){
     ?>

    <form action="" method="post">
    <label for="" class="form-label">code produit</label>
    <input type="number" class="form-control" name="id_produit" id=""  value="<?php echo $elt['id_produit'] ?>">

    <label for="" class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle" id=""  value="<?php echo $elt['libelle'] ?>">

    <label for="" class="form-label">prix de produit</label>
    <input type="number" class="form-control" name="prix" id="" min = "0"  value="<?php echo $elt['prix'] ?>">
     
    <label for="" class="form-label">quantité de produit</label>
    <input type="number" class="form-control" name="qte" id="" min = "0"  value="<?php echo $elt['qte'] ?>">

    <label for="" class="form-label">discount</label>
    <input type="number" class="form-control" name="discount" id="" min= "0" max ="100" required  value="<?php echo $elt['discount'] ?>">
    <label for="" class="form-label">categorie produitt</label>
    <select class="form-control my-2" name="categorie" id="">
        <option value="">choisir une categorie</option>
        <?php
        if($result){
        while($elt = mysqli_fetch_array($result)){
            echo'<option value="'.$elt['id_categorie'].'">'.$elt['libelle'].'</option>';
        }
    }
        ?>
    </select>
    <input type="submit"  name="modifier" value="modifier categorie " class="btn btn-primary btn-lg my-2 ">
    </form>
  
    </div>
    <?php

}
     }
    }else{
        header('location: login.php');
    }
  
     
     ?>
</body>
</html>