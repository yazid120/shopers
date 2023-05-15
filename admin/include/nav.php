<?php session_start() ;
     $connect = false;
     if(isset($_SESSION['admin'])){
      $connect = true;
     }
    
?>
<nav class="navbar navbar-expand-lg  " style="background-color: blue; color: white;" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color :aliceblue"> shopers</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
      <?php if($connect){
           ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ajouter_utilisateur.php">Ajouter admin </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="liste_admin.php">liste des admin </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="produit.php">liste des produits </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="categorie.php">liste des categories </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="ajouter_categorie.php">ajouter categorie </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="ajouter_produit.php">ajouter produit </a>
        </li>
        <li class="nav-item">
           <form action="" method="post">
           <button class="btn btn-outline" name="deconn" type="submit">Déconnexion</button>
           </form>
         </li>
        <?php
           }else{
           ?>
             
           <?php 
          } 
           if(isset($_POST['deconn'])){
            session_destroy();
            header('location: login.php');
           }
          ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>