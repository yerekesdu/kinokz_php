<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $url = "login.php";

        $login = $_POST['login'];
        $password = $_POST['password'];

        if(isset($login) && isset($password) ){
            require_once 'db.php';
            $user = getUser($login);
            
            $ok = true;

            if($user == null){
                $url = "loginform.php?message=userNotExists";
                header("Location:$url");
                $ok = false;
            }
            else if($user['password']!=sha1($password)){
                $url = "loginform.php?message=passwordIncorrect";
                header("Location:$url");
                $ok = false;
            }

            if($ok){
                session_start();
                $_SESSION['user'] = $user;
                $url = 'userpage.php';

                if($user['code']=="ADMIN"){
                    $url = "admin/adminpage.php";
                }
                header("location:$url");
            }
            
        }
    }
?>