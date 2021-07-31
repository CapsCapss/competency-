<?php
    
  require '../connectors/connection.php';

  $message = "";
  $err = "";
  $warn = '';
  
  if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cf_password'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cf_password = $_POST['cf_password'];


      function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $cf_password = validate($_POST['cf_password']);

      
        if(empty($name)){
          $err = 'Please fill all the fields';
        }
          else if(empty($email)){
            $err = 'Please fill all the fields';
        }
          else if(empty($password)){
            $err = 'Please fill all the fields';
        }
          else if(empty($cf_password)){
            $err = 'Please fill all the fields';
        }
         else if($password == $cf_password){

           $sql = 'INSERT INTO registers( name, email, password) VALUES( :name, :email, :pass)';
           $statement = $connection->prepare($sql);
     
         
           if ($statement->execute([ ':name' => $name, ':email' => $email, ':pass' => $password])) {
              $message = 'Account Registered Successfully.';
            }
          }else {
            $err = 'Password does not match';
        }

       

      } 
      
  $sql = 'SELECT * FROM registers';

  $statement = $connection->prepare($sql);

  $statement->execute();

  $registers = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Competency</title>
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
    <?php if(!empty($message)): ?>
    <div class="alert alert-success">
      <?= $message; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($err)): ?>
    <div class="alert alert-danger">
      <?= $err; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($warn)): ?>
    <div class="alert alert-warning">
      <?= $warn; ?>
    </div>
  <?php endif; ?>
  
  <form method="post">
      <h1>Register </h1>

    <div class="form-group">
      <input type="text" class="form-control input-lg" id="name" placeholder="Username " name="name"/>
    </div>

    <div class="form-group">
      <input type="email" class="form-control input-lg" id="email" placeholder="Email " name="email"/>
    </div>
    <div class="form-group">
      <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password"/>
    </div>
    <div class="form-group">
      <input type="password" class="form-control input-lg" id="cf_password" placeholder="Confirm Password" name="cf_password"/>
    </div>
    
    <button type="submit" class="btn  btn-primary">Register</button>
    <p>
        Already have account? <a href="signin.php">Sign In </a>
    </p > 

  </form>
</body>
</html>