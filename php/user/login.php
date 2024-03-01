<?php
include('../../db/connection.php');
$error1='';
if (isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query= mysqli_query($conn, "select * from  registration where Email='$email' and Password = '$password' ");
  if ($query)
  {
    if(mysqli_num_rows($query)>0){
         header('location:user_dash.php');
    }
    else
    {
        $error1 = '*Invalid Email or Password';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR +EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<form method="post" action="login.php" name="login" id="login" >
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>
                <form class="mx-1 mx-md-4">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" name="email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" name="password"  class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>
                   <div  style="display: flex;" >
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Log In</button><br>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                   <a  href="../../php/user/registration.php" class="btn btn-primary btn-lg"> Sign up</a>
                  </div>
                  </div>
                  <label style="color: red;" ><?php echo  $error1;?></label>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="../../images/logo.png" class="img-fluid" alt="Sample image"  >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
</body>
</html>
