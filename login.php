<?php
     $connection = mysqli_connect("localhost","root","","institute");
     if($_SERVER["REQUEST_METHOD"]=="POST"){
   
         $name = $_POST['name'];
         $email = $_POST['email'];
         $password = $_POST['password'];
   
         $insert_query= "INSERT INTO student VALUES ('$name','$email','$password')";
         $response = mysqli_query($connection,$insert_query);
   
   
         if($response){
            
           echo "inserted";
           header("location:login.php");
         }
         else{
           echo "not inserted";
         }
       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="container">
<form method="post">
      <input type="text " name="name" id="in1" class="input" placeholder="Enter Your Name">
      <input type="email" name="email" id="in2" class="input" placeholder="Enter Your Email">
      <input type="password" name="password" id="in3" class="input" placeholder="Enter Your Password">
      <button type="submit" id="btn">Submit</button>
     </form>
    </div>
    <?php
        $select_query = "SELECT name,email,password FROM `student` ";
        $select_conn = mysqli_query($connection,$select_query);
        if($select_conn){
            while($row = mysqli_fetch_assoc($select_conn)){
                $name_get = $row['name'];
                $email_get = $row['email'];
                $password_get = $row['password'];

                echo"
                <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>$name_get</h5>
                    <li class='card-text'>$email_get</li>
                    <li class='card-text'>$password_get</li>
                </div>
                </div>
                ";
                }
        }
        else{
            echo "data is not available";
        }
    ?>
</body>
</html>