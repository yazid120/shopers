<?php 
session_start() ;
$connect = false;
if(isset($_SESSION['admin'])){
 $connect = true;
}
if($connect){
require_once "../connection.php";
$id = $_GET['id'];
var_dump($id);
echo $id;
$sql = "DELETE FROM produit WHERE id_produit = '$id';";
$del = mysqli_query($connection,$sql);
if($del){
    header('location:./produit.php');
}
}else {
    header('location: login.php');
}
?>