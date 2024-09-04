<?php
include 'dbcon.php';
$id = null;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "select * from `form` where id = '$id'";
$result = mysqli_query($con,$query);
if(!$result){
    die("query failed".mysqli_error($conn));
}
else{
    $row=mysqli_fetch_assoc($result);
}
?>
<?php
     if(isset($_POST['update_stdents'])){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query= "update `form` set `id` = '$id' , `username` = '$username' , `password` = '$password' where id = '$id'";
        $result = mysqli_query($con,$query);
        if(!$result){
            die("  Query Failed" .mysqli_error($conn));
        }
        else{
            header('location:read.php');
        }
     }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<?php require 'navbar.php' ?>


<div class="container">
<form method="POST">
      <h1><u>update the deta</u></h1>
        <div class="form-group">
          <label >Name</label>
          <input type="text" name="username" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" required>
        </div>
        <div class="form-group">
            <label>password</label>
            <input type="text" name="password" required>
            <button type="register" class="btn btn-primary">update</button>
          </div>
  </form>
</div>

</body>
</html>