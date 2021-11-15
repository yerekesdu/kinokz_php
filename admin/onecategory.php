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
        require_once 'sidebar-top.php'
    ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

    <?php
        require_once '../messages.php';
        if(isset($_GET['message'])){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php 
            echo $messages[$_GET['message']];
        ?>
    </div>
    <?php
        }
    ?>
                    <?php
       
        if(isset($_GET['id']) && !empty($_GET['id'])){
            include '../db.php';

            $catid = $_GET['id'];
            $cats = getCategory($catid);

    ?>
            <form action="updatecategory.php" method="POST">
                <div class="col-4 mt-2">
                <input type="hidden" class="form-control col-sm" value="<?php echo $cats['id'];?>" name="id"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span>Name:</span>
                <input type="text" class="form-control col-sm" value="<?php echo $cats['name'];?>"  name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="col-4 mt-2">
                    <span>Description:</span>
                <input type="text" class="form-control col-sm" value="<?php echo $cats['description'];?>"  name="description" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>


                <div class="col-4 mt-2 ml-2">
                <button type="submit" class="btn btn-success">SAVE</button>.
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    DELETE
                </button>
                </div>
            </form>    

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="deletecategory.php" method = "POST">
        <input type="hidden" class="form-control col-sm" value="<?php echo $cats['id'];?>" name="id"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="gname">
            <button type="submit" class="btn btn-primary">Yes</button>
        </form>
    </div>
    </div>
  </div>
</div>
   
<?php  
        }
    ?>

                </div>
    <?php
        require_once 'sidebar-bottom.php'
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>