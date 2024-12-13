<?php 
    $login = false;
    $invalidPassword = false;
    include 'components/_db_connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM `isecuredata` WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($connection , $sql);
        $num = mysqli_num_rows($result);
        
        if($num == 1){
             $login = true;
             session_start();
             $_SESSION['loggedin'] = true;
             $_SESSION['username'] = $username;
             header("location: welcome.php");
        }
        else{
            $invalidPassword = true;
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

    <title>Login</title>
  </head>
  <body>
    <!-- NAVBAR  -->
     <?php require 'components/_nav.php' ?>

     <?php

        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations!</strong> You have Logged In.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

        if($invalidPassword){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oppss</strong> Invalid credential.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

     ?>


     <div class="container my-4" >
        <h2 class="text-center">Please Login</h2>
        <form action="/login.php" method="POST" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" name="username" id="username"  aria-describedby="emailHelp" placeholder="Enter Username">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input required type="password" class="form-control" name="password" id="password" placeholder="Password">
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