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

    <div class="mt-5 col-6 mx-auto">
        <h5>Добро пожаловать
        <?php
            require_once 'db.php';
            $count = 1;
            $user = $_SESSION['user'];
            $userinfo = getUserInfo($user['id']);
            $tickets = getTicketsByUser($userinfo['id']);
            echo $userinfo['fullname'];
            echo "</br>Ваша роль в системе: ".$userinfo['rolename'];
            echo "</br>Ваша почта: ".$userinfo['email'];
            echo "</br>Ваш баланс: ".$userinfo['balance'];
            echo "</br>Ваши купленные билеты: ";
        ?>
        
        <?php
            foreach($tickets as $ticket){
                $ticketInfo = getMoviesById($ticket['id']);
                // print_r($ticketInfo);
        ?>

        <button class="btn btn-dark"  data-bs-toggle="modal"  data-bs-target="#exampleModal<?php echo $count?>">        
        <?php      
                echo "Ticket#";
                echo $ticket['id'];
                $ticketInfo = getMoviesById($ticket['id']);
                echo "  ";
        ?>
        </button>

<div class="modal fade" id="exampleModal<?php echo $count?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Номер билета №<?php echo $ticket['id'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            echo "Кинотеатр: ".$ticketInfo['cname'];
            echo "</br>Фильм: ".$ticketInfo['fname'];
            echo "</br>Время: ".$ticketInfo['time'];
            echo "</br>Цена: ".$ticketInfo['price'];
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <form action="buyticket.php" method = "POST">
        <input type="hidden" name="movid">
        <input type="hidden" name="userid">
            <button type="button" class="btn btn-success">Распечатать</button>
        </form>
    </div>
    </div>
  </div>
</div>
        <?php
            $count++;
            }
        ?>

        </h5>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>    
</body>
</html>