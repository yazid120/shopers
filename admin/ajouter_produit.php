<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="icon/png"  href="../image/shopping.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>admin</title>
</head>
<body>
    <?php
    require_once "../connection.php";
    include_once "./include/nav.php";
    if($connect){
    $sql = "SELECT * FROM categorie ";
    $result = mysqli_query($connection,$sql);
    
    
     ?>
    <div class="container py-2">
    <h4 style="margin-top:7px; text-align: center;">ajouter produit</h4>
     <?php
     if(isset($_POST['ajc'])){
       $code_product = $_POST['id_produit'];
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $qte = $_POST['qte'];
        $date = date('y-m-d');
        $id_categorie = $_POST['categorie'];
        $image = "";
        
        if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'];
            $filename = uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],'../upload/produit/'.$filename);
                  
        }
         
        if(!empty($code_product) && !empty($libelle) && !empty($prix)  && !empty($id_categorie) && !empty($qte)){
           $sqli = "INSERT INTO produit (id_produit,libelle,prix,qte,discount,date_creation,image,id_categorie) VALUES ('$code_product','$libelle','$prix',$qte,'$discount','$date','$filename','$id_categorie')";
            $insert = mysqli_query($connection,$sqli);
            if($insert){
                ?>
                <div class="alert alert-success" role="alert">
                  le produit <?php echo $libelle  ?> a été bien ajouter !
                </div>
                <?php
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
        les champs sont vide !
      </div>
      <?php
        }
     } 
     ?>

    <form action="" method="post" enctype="multipart/form-data">
    <label for="" class="form-label">code produit</label>
    <input type="number" class="form-control" name="id_produit" id="" >

    <label for="" class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle" id="" >

    <label for="" class="form-label">prix de produit</label>
    <input type="number" class="form-control" name="prix" id="" min = "0">

    <label for="" class="form-label">quantité de produit</label>
    <input type="number" class="form-control" name="qte" id="" min = "0">

    <label for="" class="form-label">discount</label>
    <input type="number" class="form-control" name="discount" id="" min= "0" max ="100" required>
    
    <label for="image" class="form-label">image produit</label>
    <input type="file" class="form-control" name="image" id="">

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
    <input type="submit"  name="ajc" value="ajouter produit " class="btn btn-primary btn-lg my-2 ">
    </form>
  
    </div>
</body>
</html>
<?php }else{
    header('location: login.php');
 } ?>