<?php 
 
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $cinema_id = $_POST['cinema_id'];
    $film_id = $_POST['film_id'];
    $time = $_POST['time'];
    $price = $_POST['price'];
        
    // echo $cinema_id;
    // echo "<br>";
    // echo $film_id;
    // echo "<br>";
    // echo $time;
    // echo "<br>";
    // echo $price;
    // echo "<br>";

     if($cinema_id && $film_id && $time && $price){
         include '../db.php';
         addMovie($cinema_id, $film_id, $time, $price);
         header("Location:adminmovies.php");
     }
 }
 ?>
