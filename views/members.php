<?php 
    require '../connectors/connection.php';
    $message = '';
   if(isset($_POST['group_id']) && isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['contact_no']) && isset($_POST['address'])){

        $group_id = $_POST['group_id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $address = $_POST['address'];

        $sql = 'INSERT INTO members( group_id, full_name, email, contact_no, address,) VALUES( :group_id, :full_name, :email, :contact_no, :addrss)';
        $statement = $connection->prepare($sql);

       if($statement->execute([':group_id' => $group_id, ':full_name' => $full_name, ':email' => $email, ':contact_no' => $contact_no, ':addrss' => $address])){
         $message = 'Member added successfully.';
       }
   }

   $sql = 'SELECT * FROM members';

   $statement = $connection->prepare($sql);
 
   $statement->execute();
 
   $members = $statement->fetchAll(PDO::FETCH_OBJ);

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
    <title>Members</title>
</head>
<style>
  form {
    padding-left: 200px;
    padding-right: 200px;
    padding-top: 50px;

  }
</style>
<body>
<?php if(!empty($message)): ?>
    <div class="alert alert-success">
      <?= $message; ?>
    </div>
    <?php endif; ?>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand"  href="Header.php">TRAINING APPLICATION</a>
      <img src="/competency/static/images/fav.png" alt="" width="30" height="24" class="d-inline-block align-text-top" >
    </div>
    <a class="navbar-brand" >
      Members List
    </a>
  </div>
</nav>
<form method='post'>
    <div class='d-flex flex-row-reverse'>
        
    <select class="form-select w-25" aria-label="Default select example">
        <option value="all">All</option>
        <option value="1" >Group1</option>
        <option value="2">Group2</option>
    </select> 

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Member</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Member Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label>Group: </label>
          <select class="form-select" aria-label="Default select example">
                <option value = "1"  name="group_id">Group1</option>
                <option value ="2"   name="group_id">Group2</option>
          </select>

      <label class="mt-2"> Full Name: </label>
        <div class="form-group mt-2">
            <input type="text" class="form-control input-lg" id="full_name" placeholder="Full Name" name="full_name"/>
        </div>

    <label class="mt-2"> Email: </label>
      <div class="form-group mt-2">
           <input type="text" class="form-control input-lg" id="email" placeholder="Email" name="email"/>
      </div>

    <label class="mt-2"> Contact Number:</label>
      <div class="form-group mt-2">
          <input type="number" class="form-control input-lg" id="contact_no" placeholder="Contact Number" name="contact_no"/>
      </div>

    <label class="mt-2"> Address: </label>
      <div class="form-group mt-2">
          <input type="text" class="form-control input-lg" id="address" placeholder="Address" name="address"/>
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
<table class="table table-dark table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Group</th>
      <th scope="col">Email</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach($members as $members): ?>
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
        <?php endforeach; ?>
      </tbody>
</table>
</div>
<div>
</div>
</form>
</body>
</html>