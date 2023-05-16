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
    <?php include_once "./include/nav.php" ;
    if($connect){
    ?>
    <div class="container py-2">
    <h4 style="margin-top:7px; text-align: center;">ajouter categorie</h4>
    <?php
    if(isset($_POST['ajc'])){
        if(!empty($_POST['libelle']) && !empty($_POST['description']) &&  !empty($_POST['icon'])){
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icon = $_POST['icon'];
            $date = date('y-m-d');
           require_once "./include/connection.php";
           $sql = "INSERT INTO categorie(libelle,description,icon,date_creation) VALUES('$libelle','$description','$icon','$date')";
           $result = mysqli_query($connection,$sql);
        if($result){
            ?>
        <div class="alert alert-success" role="alert">
        la categorie a etait bien ajouter.
        </div>
        <?php
        }
        }
        else{
            ?>
      <div class="alert alert-danger" role="alert">
        les champs sont vide !
      </div>
      <?php
        }
    }
    ?>
    <form action="" method="post">

    <label for="" class="form-label">libelle</label>
    <input type="text" class="form-control" name="libelle" id="" >

    <label for="" class="form-label">icon tag</label>
    <input type="text" class="form-control" name="icon" id="" placeholder="insert from ionicon">

    <label for="" class="form-label">description</label>

    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>

    <input type="submit"  name="ajc" value="ajouter categorie " class="btn btn-primary btn-lg my-2 ">
    </form>
  
    </div>
</body>
</html>
 <?php }else{
    header('location: login.php');
 } ?>