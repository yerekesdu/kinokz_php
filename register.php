<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $url = "regiser.php";

        $login = $_POST['login'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $fullname = $_POST['fullname'];

        if(isset($login) && isset($password) && isset($repassword) &&isset($fullname)){
            require_once 'db.php';
            $user = getUser($login);
            
            $ok = true;

            if($user != null){
                $url = "registerform.php?message=userExists";
                header("Location:$url");
                $ok = false;
            }
            if(strcmp($password, $repassword) !=0 ){
                header("Location:registerform.php?message=passwordMissmatch");
                $ok = false;
            }

            if(strlen($password) != strlen($repassword)){
                header("Location:registerform.php?message=passwordLength");
                $ok = false;
            }
            if($ok)
            registerUser($login, sha1($password), $fullname);
            header("location: loginform.php?registered");
        }
    }
?>