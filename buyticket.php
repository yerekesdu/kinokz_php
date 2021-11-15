<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['movid']) && isset($_POST['userid']) && !empty($_POST['movid']) && !empty($_POST['userid']) ){
            require_once 'db.php';
            
            $movid = $_POST['movid'];
            $userid = $_POST['userid'];
            
            addTicket($userid, $movid);
            header("location:userpage.php");
        }
    }
?>