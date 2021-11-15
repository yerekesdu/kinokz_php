<?php
    //require_once '../authorized.php';
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
        require_once 'sidebar-top.php'
    ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!--OUR CONTENT HERE-->

<?php
    require_once('../db.php');
    $movies = getAllMovies();
?>
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
  <tbody>
      <?php foreach ($movies as $movie){
      ?>
    <tr>
      <td><?php echo $movie['id']; ?></td>
      <td><?php echo $movie['cname']; ?></td>
      <td><?php echo $movie['fname']; ?></td>
      <td><?php echo $movie['time']; ?></td>
      <td><?php echo $movie['price']; ?></td>
      <td><a class = "btn btn-primary" href="onegood.php?id=<?php echo $movie['id'];?>">Details</a></td>

    </tr>
<?php
       }
?>
</tbody>
</table>             
        </div>
    <?php
        require_once 'sidebar-bottom.php'
    ?>
</body>
</html>