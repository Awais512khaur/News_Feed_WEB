<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../style/admin.css">
    <title>News Feed</title>
</head>
<body>
<div class="container">
<form action="admin.php" method="post" >
    <h2>Admin Login</h2>
    <div class="login">
    <input type="text" name="email" class="input" id="email"  placeholder="Enter User Name">
    <input type="password" name="password" class="input"  id="pwd" placeholder="Enter your password">
    </div>
    <button type="submit" name="submit"  value="login" > LOG IN</button>
</form>
</body>
</html>
<?php
include('../db/connection.php');
if (isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];

  $query= mysqli_query($conn, "select * from admin_login where name='$email' and password = '$password' ");
  if ($query)
  {
    if(mysqli_num_rows($query)>0){
         header('location:news.php');
    }
    else
    {
        echo '<br><span style="color:red;margin-left: 324px;" >Invalid Email/Password, Try again </span>';
    }
  }
}
?>