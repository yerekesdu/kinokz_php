<?php
    // session_start();
    
    // if(isset($_SESSION['user']))
    //     header("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <?php
    include "header.php";
  ?>  
  <?php
    if(isset($_GET['message'])){
  ?>
    <div class="alert alert-danger">
      <?php
        require_once 'messages.php'; 
        echo $messages[$_GET['message']];
      ?>
    </div>
      <?php
      }
      ?>
    <?php
    if(isset($_GET['registered'])){
  ?>
    <div class="alert alert-success">
        You successfully registered, try to log in.
    </div>
      <?php
      }
      ?>

<form id="logform" class="mt-5 w-50 mx-auto" action="login.php" method = "POST">
  <div class="mb-3">
  <div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="text" class="form-control" name = "login" id="login" aria-describedby="loginHelp" required>
    <div id="loginHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name= "password" id="password" aria-describedby="passwordHelp" required>
    <div id="passwordHelp" class="form-text"></div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="button" class="btn btn-primary" onclick = "dologin()">Register</button>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>