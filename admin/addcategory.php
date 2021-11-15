<?php 
 
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $getname = $_POST['name'];
    $getdescription = $_POST['description'];

     if($getname && $getdescription){
         include '../db.php';
         addCategory($getname, $getdescription);
         header("Location:categories.php");
     }
 }
 ?>
