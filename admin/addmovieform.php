<?php
    // require_once '../authorized.php';
    // checkIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once 'admin-head.php';
    ?>
    <title>Document</title>
</head>
<body id="page-top">
    <?php
        require_once 'sidebar-top.php';
        require_once '../db.php';

        $movies = getAllMovies();
        $cinemas = getAllCinemas();
        $films = getAllFilms();
    ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

    <form action="addmovie.php" method="POST">
        <div class="col-4 mt-2 ml-2">
            <span>Кинотеатр:</span>
        
        <select class="form-control col-sm" aria-label="Default select example" name="cinema_id">
            <?php 
              if($cinemas!=null){
                foreach($cinemas as $cinema){
            ?>
            <option value="<?php echo $cinema['id'] ?>"><?php echo $cinema['name'] ?></option>
            <?php
                }
              }
            ?>
        </select>    
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Фильм:</span>
        <select class="form-control col-sm" aria-label="Default select example" name="film_id">
            <?php 
              if($films!=null){
                foreach($films as $film){
            ?>
            <option value="<?php echo $film['id'] ?>"><?php echo $film['name'] ?></option>
            <?php
                }
              }
            ?>
        </select>    
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Время:</span>
        <input type="datetime-local" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="time">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Цена:</span>
        <input type="number" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price">
        </div>
        
        </div>

        <div class="col-4 mt-2 ml-2">
        <button type="submit" class="btn btn-success">Add movie</button>
        </div>
    </form>    

        </div>
    <?php
        require_once 'sidebar-bottom.php'
    ?>
</body>
</html>