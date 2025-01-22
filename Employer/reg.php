<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('./static/style.css');
    </style>
</head>

<body>
    <?php include_once("./components/header.php"); ?>
    <div class="w-100 container">
        <div class="m-auto border border-5 my-2 p-4 border-info">
            <form action="query.php" method="post">
                <h1 class="text-center fs-2 fw-bold bg-warning text-success py-2">
                    Registration New Employer
                </h1>
                <input type="text" name="name" id="" class="form-control border border-dark my-2" placeholder="Enter Your Name">
                <input type="text" name="uname" id="" class="form-control border border-dark my-2" placeholder="Enter Your Username">
                <input type="text" name="pwd" id="" class="form-control border border-dark my-2" placeholder="Enter Your Password">
                <input type="text" name="mobile" id="" class="form-control border border-dark my-2" placeholder="Enter Your Mobile">
                <input type="email" name="email" id="" class="form-control border border-dark my-2" placeholder="Enter Your Email">                
                <div class="form-floating">
                <textarea class="form-control border border-dark my-2" name="adr" placeholder="Leave a Address here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Address</label>
                </div>                
                <div class="text-center my-2">
                    <input type="submit" class="btn btn-success" value="Create Account" name="reg">
                </div>
            </form>
        </div>
    </div>


    <?php include_once("./components/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>