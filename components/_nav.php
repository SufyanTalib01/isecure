<?php 

$loggedIn = false;
if(isset($_SESSION['loggedin'])){
  $loggedIn = true;
}


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ISecure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/welcome.php">Home <span class="sr-only"></span></a>
      </li>';


      if(!$loggedIn){
        echo '<li class="nav-item">
        <a class="nav-link" href="/signup.php">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login.php">Login</a>
      </li>';
      }
      
      if($loggedIn){
        echo '<li class="nav-item">
        <a class="nav-link" href="/logout.php">Log out</a>
      </li>';
      }

      

      
    echo '</ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>';


?>