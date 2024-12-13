<?php 

    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'isecure';

    $connection = mysqli_connect($localhost , $username , $password , $database);

    if(isset($connection)){
        
    }
    else{
        echo "Unsuccessfull" . mysqli_connect_error();
    }

?>