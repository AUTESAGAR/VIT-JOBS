<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","vit_jobs") or die("Not Connect");
    if(!isset($_SESSION['admin_uname'])){
        header("Location:index.php");
    }
    $query = "SELECT * FROM `post`";
    $run = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>
<body>
    <?php include_once("./components/header.php"); ?>
    <main class="m-auto mx-5 my-2">
        <table class="border table table-hover" style="background:wheat">
            <tr>
                <th colspan="8" class="text-center fs-1 fw-bold text-warning bg-info">
                    Manage Your All Job Profiles
                </th>                
            </tr>
            <tr>
                <th colspan="8" class="text-center fs-1 fw-bold text-warning bg-info">
                    <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Job Post</button>
                </th>
            </tr>            
            <tr class="border border-info">
                <th>Job Banner</th>
                <th>Job Title</th>
                <th>Job Description</th>
                <th>Job Location</th>
                <th colspan="2">Operation</th>
            </tr>            
            <!-- Add Job Post Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Job Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="query.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control mb-2" name="title" placeholder="Enter Job Title">
                            <input type="text" class="form-control mb-2" name="description" placeholder="Enter Job Description">
                            <input type="text" class="form-control mb-2" name="location" placeholder="Enter Job Location">
                            <input type="file" class="form-control mb-2" name="banner" >
                            <div class="text-center">
                                <input type="submit" value="Add" name="add" class="btn btn-success">
                            </div>
                        </form>
                        </div>                
                    </div>
                </div>
            </div>           

            <?php               
              if(isset($_GET['page'])) { 
                $c_p = $_GET['page'];
              }
              else{ 
                $c_p = 1; 
              }
              $p_p_p = 3;
              $start = ($c_p - 1) * $p_p_p;
              $query = "SELECT * FROM `post` LIMIT $start, $p_p_p";
              $result = mysqli_query($conn,$query);
              if (mysqli_num_rows($result) > 0){
              while ($data = mysqli_fetch_assoc($result)){
            ?>
            <tr class="border border-info">
                <td><img src="<?php echo $data['banner'] ?>" alt="" height="100px"></td>                
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['description']; ?></td>
                <td><?php echo $data['location']; ?></td>                
                <td><a href="edit_post.php?id=<?php echo $data['id']; ?>" class="fs-2 text-success"><i class="fa-solid fa-pen-to-square"></i></i></a></td>
                <td>
                    <form action="query.php" method="post">
                        <input type="hidden" name="delete" value="<?php echo $data['id']; ?>">
                        <button type="submit" class="fs-2 text-danger bg-wheat" style="border:2px solid wheat;background:wheat;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php } } else {  ?> 
                <tr class="border border-info">
                    <td colspan="6"><?php echo "No results found."; ?></td>
                </tr>    
            <?php } ?>                    
        </table>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 m-auto mx-5 px-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="home.php?page=">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=2">2</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=3">3</a></li>
                        <li class="page-item"><a class="page-link" href="home.php?page=">Next</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-4"></div>
        </div>
    </main>    
    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>