<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">KINOKZ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="cinemas.php">Cinemas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="films.php">Films</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movies.php">Movies</a>
        </li>
      </ul>
      <form class="d-flex form-dark bg-dark">
            <?php
                session_start();
                if(isset($_SESSION['user']) && !empty(isset($_SESSION['user'])) ){
            ?>
                <a class="nav-link" href="userpage.php"><?php 
                  $user = $_SESSION['user'];
                  echo $user['fullname'];
                ?></a>
                <a class="nav-link" href="logout.php">LOGOUT</a>
                
            <?php 
                }
                else{
            ?>

                <a class="nav-link" href="loginform.php">Login</a>
                <a class="nav-link" href="registerform.php">Register</a>
                
            <?php
                }
            ?>
      </form>
    </div>
  </div>
</nav>