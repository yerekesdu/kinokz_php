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

    <h2 class="mt-2"> Все кинотеатры </h2>

    <form action="cinemas.php" method="GET">
    <div class="col-4 mt-2 ml-2">
    <select class = "form-select col-sm" name = "city_name" onchange="getCity()" id="selid">
        <option value = '0' <?php if(isset($_GET['city']) && $_GET['city']==0) echo "selected"; ?> >Все кинотеатры</option>
        <?php
            require_once 'db.php'; 
            $cities = getAllCities();
            foreach($cities as $city){
        ?>
        <option value = "<?php echo $city['id']; ?>" <?php if(isset($_GET['city']) && $_GET['city']==$city['id']) echo "selected"; ?> >
        <?php echo $city['city_name']; ?>
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
            if(isset($_GET['city']) && !empty($_GET['city'])){
                $cinemas = getCinemasbyCity($_GET['city']);
            }    
            else
                $cinemas = getAllCinemas();    

                foreach($cinemas as $cinema){
        ?>
        
        <div class="card mb-4" style="width: 18rem;">
            <img src="<?php echo $cinema['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $cinema['name'];?></h5>
                <p class="card-text"><?php echo $cinema['short_desc']?>...</p>
                <a href="onecinema.php?id=<?php echo $cinema['id']; ?>" class="btn btn-dark">Про кинотеатр</a>
            </div>
        </div>

        <?php
            }
        ?>
        
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    
<script type="text/javascript" src="js/cinemas.js"></script>
</body>
</html>