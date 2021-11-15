<?php
    require_once '../authorized.php';
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
    ?>
<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

    <form action="addcategory.php" method="POST">
        <div class="col-4 mt-2 ml-2">
            <span>Name:</span>
        <input type="text" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name">
        </div>

        <div class="col-4 mt-2 ml-2">
            <span>Description:</span>
        <input type="text" class="form-control col-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="description">
        </div>

        <div class="col-4 mt-2 ml-2">
        <button type="submit" class="btn btn-success">Add category</button>
        </div>
    </form>    

        </div>
    <?php
        require_once 'sidebar-bottom.php'
    ?>
</body>
</html>