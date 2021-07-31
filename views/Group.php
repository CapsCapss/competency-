<?php 
    require '../connectors/connection.php';

    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])){
        
     
        $name = $_POST['name'];
        $description = $_POST['description'];
        

        $sql = 'INSERT INTO groups( name, description, active) VALUES ( :name, :descrption, :active)';
        $statement = $connection->prepare($sql);

        if($statement->execute([ ':name' => $name, ':descrption' => $description])){
            $message = 'Group added successfully.';
          }
    }
    $sql = 'SELECT * FROM groups';

   $statement = $connection->prepare($sql);
 
   $statement->execute();
 
   $groups = $statement->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../static/images/fav.png" />
    <title>Group</title>
</head>
<style>
  form {
    padding-left: 200px;
    padding-right: 200px;
    padding-top: 50px;

  }
</style>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand"  href="Header.php">TRAINING APPLICATION</a>
      <img src="/competency/static/images/fav.png" alt="" width="30" height="24" class="d-inline-block align-text-top" >
    </div>
    <a class="navbar-brand" >
      Groups List
    </a>
  </div>
</nav>
<form method='post'>
 
    <div class='d-flex flex-row-reverse'>
        
    <select class="form-select w-25" aria-label="Default select example">
        <option value="all">All</option>
        <option value="1" >Yes</option>
        <option value="2">No</option>
    </select> 

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Group</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Group Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label class="mt-2"> Name: </label>
        <div class="form-group mt-2">
            <input type="text" class="form-control input-lg" id="name" placeholder=" Name" name="name"/>
        </div>

    <label class="mt-2"> Description: </label>
      <div class="form-group mt-2">
           <input type="text" class="form-control input-lg" id="descrption" placeholder="Description" name="descrption"/>
      </div>


      </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-success rouded">Save</button>
      </div>

    </div>
  </div>
</div>
</div>
<div>
<div class='from-group'> 
    <form method="post" class="form-inline">
        <input type="text" class="form-control input-lg w-25" id="search" placeholder="Search here" name="search"/> <button type="submit" class="btn btn-primary pl-5 ">Find</button>
    </form>
<div>
<table class="table table-dark table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Active</th>
      
    </tr>
  </thead>
  <tbody>
        <!-- <?php foreach($members as $members): ?> -->
        <tr>
          <td><?= $members->id; ?></td>
          <td><?= $members->full_name; ?></td>
          <td><?= $members->group_id; ?></td>
          <td><?= $members->email; ?></td>
          <td><?= $members->contact_no; ?></td>
          <td><?= $members->address; ?></td>
          <td>
        </td>
        </tr>
        <!-- <?php endforeach; ?> -->
      </tbody>
</table>
</div>
</body>
</form>
</html>