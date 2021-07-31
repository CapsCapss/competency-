<?php 
 session_start();
 session_destroy();

  require '../connectors/connection.php';
  include_once '../connectors/Query.php';
  
  $queries = new signIn();
  $message = '';
    if (isset($_POST['email']) && isset($_POST['pass'])) {
      $message = $queries->readSignin($_POST['email'], $_POST['pass']);
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="../static/images/fav.png" />
</head>

<style>
  form {
    padding-left: 200px;
    padding-right: 200px;
    padding-top: 50px;

  }
</style>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">TRAINING APPLICATION</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Member</a></li>
      <li class="active"><a href="">Group</a></li>
    </ul>
</nav>

<form method="post">
      <h1> LOGIN </h1>

    <div class="form-group">
      <input type="text" class="form-control input-lg" id="email" placeholder="Email " name="email"/>
    </div>

    <div class="form-group">
      <input type="password" class="form-control input-lg" id="pass" placeholder="Password" name="pass"/>
    </div>

    <button type="submit" class="btn btn-primary">LOGIN</button> 
    <p>
        Don't have an account? <a href="./register.php">Sign Up </a>
    </p > 
  </form>
</body>
</html>