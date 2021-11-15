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
    <h2 class="mt-3">О фильме</h2>
    <div class="d-flex mt-3 flex-wrap justify-content-between">

        <?php
            if(isset($_GET['id']) && !empty($_GET['id'])){
            require_once 'db.php';
            $film = getFilm($_GET['id']);
        ?>
        <div class="card mb-3" style="max-width: 1040px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="<?php echo $film['image']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title"><?php echo $film['name'];?></h4>
                <p class="card-text"><?php echo $film['description'];?></p>
                <span class="card-text fw-bold">Жанр: </span><span><?php echo $film['type_name'];?></span></br>
                <span class="card-text fw-bold">Страна: </span><?php echo $film['cname'];?></span></br>
                <span class="card-text fw-bold">Продолжительность: </span><?php echo $film['duration'];?></span></br>
                <a class="btn btn-dark" href="movies.php?filmid=<?php echo $film['id']; ?>">Сеансы</a>
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