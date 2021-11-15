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
    <h2 class="mt-3">О кинотеатре</h2>
    <div class="d-flex mt-3 flex-wrap justify-content-between">

        <?php
            if(isset($_GET['id']) && !empty($_GET['id'])){
            require_once 'db.php';
            $cinema = getCinema($_GET['id']);
        ?>
        <div class="card mb-3" style="max-width: 1040px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="<?php echo $cinema['image']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title"><?php echo $cinema['name'];?></h4>
                <p class="card-text"><?php echo $cinema['description'];?></p>
                <span class="card-text fw-bold">Адрес: </span><span><?php echo $cinema['address'];?></span></br>
                <span class="card-text fw-bold">Контакты: </span><?php echo $cinema['contacts'];?></span></br>
                <span class="card-text fw-bold">Город: </span><?php echo $cinema['city_name'];?></span></br></br>
                <a class="btn btn-dark" href="movies.php?cinemaid=<?php echo $cinema['id']; ?>">Сеансы</a>
            </div>
            </div>
        </div>
    </div>

        <?php
            }
        ?>
        
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    
</body>
</html>