<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>
</head>
<body>
    <?php require 'navbar.php' ?>
<?php
    if(isset($_POST["login"])){
        if(!empty($_POST["name"]) && !empty($_POST["password"])){
            $user = $_POST['name'];
            $password = $_POST['password'];
            
            $query = mysqli_query($conn, "SELECT * FROM nida WHERE name = '".$user."' AND password = '".$password."'");
            $numrows = mysqli_num_rows($query);
            
            if($numrows != 0){
                while($row = mysqli_fetch_assoc($query)){
                    $databasename = $row['name'];
                    $databasepassword = $row['password']; 
                }

                if($user == $databasename && $password == $databasepassword) { 
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header("location: index.php"); 
                }
            }
            else{
                echo "invalid username or password!";
            }
        } else{
            echo "all fields are required!";
        }
    }
?>
<form action="" method="post">
        <h1>Login Form</h1>
       
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <p>New to this page <a href="register.php">Register</a></p>
        <div>
            <input type="submit" value="Login" name="register" id="btn">
        </div>
    </form>
</body>
</html>