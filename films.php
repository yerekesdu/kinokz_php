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

    <h2 class="mt-2"> Все фильмы </h2>

    <form action="films.php" method="GET">
    <div class="col-4 mt-2 ml-2">
    <select class = "form-select col-sm" name = "film_type" onchange="getfilmtype()" id="selid">
        <option value = '0' <?php if(isset($_GET['type']) && $_GET['type']==0) echo "selected"; ?> >Все жанры</option>
        
        <?php
            require_once 'db.php'; 
            $filmtypes = getAllFilmTypes();
            print_r($filmtypes);
            foreach($filmtypes as $filmtype){
        ?>
        <option value = "<?php echo $filmtype['id']; ?>" <?php if(isset($_GET['type']) && $_GET['type']==$filmtype['id']) echo "selected"; ?> >
        <?php echo $filmtype['type_name']; ?>
        </option>
        <?php
            }
        ?>


    </select>
    </div>
    </form>
    

    <div class="d-flex mt-5 flex-wrap justify-content-between">

        <?php
            require_once 'db.php';
            if(isset($_GET['type']) && !empty($_GET['type'])){
                $films = getFilmsbyType($_GET['type']);
            }    
            else
                $films = getAllFilms();               
                
                foreach($films as $film){
        ?>
        
        <div class="card mb-4" style="width: 18rem;">
            <img src="<?php echo $film['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $film['name'];?></h5>
                <p class="card-text"><?php echo $film['short_desc']?>...</p>
                <a href="onefilm.php?id=<?php echo $film['id']; ?>" class="btn btn-dark">Про фильм</a>
            </div>
        </div>

        <?php
            }
        ?>
        
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    
<script type="text/javascript" src="js/films.js"></script>
</body>
</html>