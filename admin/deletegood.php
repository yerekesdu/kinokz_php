<?php

        if($_POST['id']){
            include '../db.php';
            
            $getid = $_POST['id'];

            deleteGood($getid);
            header("Location: goods.php");
        }
    ?>
