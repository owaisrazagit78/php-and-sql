<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'navbar.php' ?>
<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th >name</th>
      <th >email</th>
      <th>password</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query ="select * from 'form'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error($conn));
    }
    else{
        while($row=mysqli_fetch_assoc($result))
    }
    
    ?>



    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
</body>
</html>