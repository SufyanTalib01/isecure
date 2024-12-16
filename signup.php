<?php 

    $insert = false;
    $notConfirmPassword = false;
    $ExistUsername = false;
    include 'components/_db_connect.php';
    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        
        $existSql = "SELECT * FROM `isecuredata` WHERE username = '$username'";
        $result = mysqli_query($connection , $existSql);
        $existNumRow = mysqli_num_rows($result);
        $newExistNumRow = ctype_alnum($username);

        if($existNumRow > 0){
            $ExistUsername = true;
        }
        // elseif(preg_match('/^[a-zA-Z]+$/' , $username)){
        //     echo "Invalid username. Only alphabets are allowed.";
        // }
        else{
            if(($password == $cpassword) ){
            
            $hash = password_hash($password , PASSWORD_DEFAULT);
            $sql = "INSERT INTO `isecuredata` (`username`, `password`, `dt`) VALUES ('$username', '$hash', CURRENT_TIMESTAMP);";
            
            $result = mysqli_query($connection , $sql);

            if($result){
                $insert = true;
            }

        }
            else{
                $notConfirmPassword = true;

            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign up</title>
  </head>
  <body>
    <!-- NAVBAR  -->
     <?php require 'components/_nav.php' ?>

     <?php 
        if($insert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations</strong> your account has been created. Please Login Your Account
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if($ExistUsername){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oppsss</strong> This Username is Already.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if($notConfirmPassword){
            echo '<script>alert("password and confirm password is not same")</script>';
        }
     ?>

    <div class="container my-4" >
        <h2 class="text-center">Please Sign Up</h2>
        <form action="signup.php" method="POST" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" name="username" id="username"  aria-describedby="emailHelp" placeholder="Enter Username">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input required type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="cpassword">Confirm Password</label>
                    <input required type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary col-md-6">Submit</button>
        </form>
    </div>

    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>