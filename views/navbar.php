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
<script>
      function signin() {
        window.location = '/competency/views/signin.php';
      }
     
  </script>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">TRAINING APPLICATION</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a >Member</a></li>
      <li class="active"><a >Group</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a onclick = signin()><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<div class="text-center">
<img src="./static/images/logo.png" class="img-rounded" alt="Cinque Terre">
</div>
</body>
</html>