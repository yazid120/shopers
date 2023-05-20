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
$sql = "DELETE FROM categorie WHERE id_categorie = '$id';";
$del = mysqli_query($connection,$sql);
if($del){
    header('location:./categorie.php');
}

 }else{
    header('location: login.php');
 } 
?>