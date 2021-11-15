<?php

        if($_POST['id']){
            require_once '../db.php';
            
            $getid = $_POST['id'];
            
            $getGoodID = goodByCatID($getid);

            print_r($getGoodID);
            // deletecategory($getid);
            // header("Location: categories.php");
            if($getGoodID){
                header("Location: onecategory.php?id=$getid&message=goodExistsWithCatid");
            }    
            else{
                deleteCategory($getid);
                header("Location: categories.php");
            } 
        }
    ?>
