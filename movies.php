<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<div class="container">

    <?php
        include "header.php";
    ?>

    <h2 class="mt-2"> Все сеанcы </h2>

  <div class="d-flex gap-3 mb-2">
    <div class="col-4 mt-2 ml-2">
    <select class = "form-select col-sm" name = "cinema" onchange="getCinema()" id="cinema">
        
          <option value = '0' <?php if(isset($_GET['cinemaid']) && $_GET['cinemaid']==0) echo "selected"; ?> >Все кинотеатры</option>
        
        <?php
            require_once 'db.php'; 
            $cinemas = getAllCinemas();
            foreach($cinemas as $cinema){
        ?>
        <option value = "<?php echo $cinema['id']; ?>" <?php if(isset($_GET['cinemaid']) && $_GET['cinemaid']==$cinema['id']) echo "selected"; ?> >
        <?php echo $cinema['name']; ?>
        </option>
        <?php
            }
        ?>

    </select>
    </div>

    <div class="col-4 mt-2 ml-2">
      <select class = "form-select col-sm" name = "film" onchange="getFilm()" id="film">
          
          <option value = '0' <?php if(isset($_GET['filmid']) && $_GET['filmid']==0) echo "selected"; ?> >Все фильмы</option>
        
          <?php
              require_once 'db.php'; 
              $films = getAllFilms();
              foreach($films as $film){
          ?>
          <option value = "<?php echo $film['id']; ?>" <?php if(isset($_GET['filmid']) && $_GET['filmid']==$film['id']) echo "selected"; ?> >
          <?php echo $film['name']; ?>
          </option>
          <?php
              }
          ?>
      </select>
    </div>  

    <div class="mt-2 col-3">
      <input class="form-control col-sm" id="myInput" type="text" placeholder="Поиск..">
    </div>
    
</div>  



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Кинотеатр</th>
      <th scope="col">Фильм</th>
      <th scope="col">Время</th>
      <th scope="col">Цена</th>
      <th scope="col">Купить</th>
    </tr>
  </thead>
  <tbody id="myTable">
      <?php
        require_once 'db.php';
        $count = 1;
        if(isset($_GET['cinemaid']) && !empty($_GET['cinemaid'])){
            $movies = getMoviesByCinema($_GET['cinemaid']);
        }
        else if (isset($_GET['filmid']) && !empty($_GET['filmid'])){
            $movies = getMoviesByFilm($_GET['filmid']);;
        }
        else
            $movies = getAllMovies();
        
        foreach ($movies as $movie){
      ?>
    <tr>
      <td><?php echo $movie['id']; ?></td>
      <td><?php echo $movie['cname']; ?></td>
      <td><?php echo $movie['fname']; ?></td>
      <td><?php echo $movie['time']; ?></td>
      <td><?php echo $movie['price']; ?></td>
      <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $count?>">
            Купить</button> 
      </td>

    </tr>
<?php 
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
?>
<div class="modal fade" id="exampleModal<?php echo $count?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Купить билет</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Цена за этот сеанс: <?php echo $movie['price']; ?></br>
        У вас на счету: <?php
                            // session_start();
                            $user = $_SESSION['user'];
                            $balance = getBalance($user['id']);
                            echo $balance['balance'];
                        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <form action="buyticket.php" method = "POST">
        <input type="hidden" value="<?php echo $movie['id'];?>" name="movid">
        <input type="hidden" value="<?php echo $user['id'];?>" name="userid">
            <button type="submit" class="btn btn-success">Купить</button>
        </form>
    </div>
    </div>
  </div>
</div>

<?php $count++?>

<?php
    }
    else {
?>

<div class="modal fade" id="exampleModal<?php echo $count?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Купить билет</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Вам нужно авторизоваться для закупа билета    
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>        
            <a class="btn btn-success" href="loginform.php">Перейти на страницу авторизации</a>
    </div>
    </div>
  </div>
</div>

<?php
        }
    }
?>

</tbody>
</table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    
<script type="text/javascript" src="js/movies.js"></script>
</body>
</html>