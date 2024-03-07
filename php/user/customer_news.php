<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Add News</title>
</head>
<?php
include('../../include/bootstrap/customer_nav.php');
?>
<body>
   
    <form method="post"  action="customer_news.php" id="customernews" enctype="multipart/form-data" style="margin-top: -79rem;" >
    <h1 >Add News</h1>
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100" style="margin-top: -48rem;" >
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add News</h3>
            <div class="alert alert-info" role="alert">
                    <marquee> All fields are required !</marquee>
                    </div>
            <form>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="title" class="form-control form-control-lg" name="title" />
                    <label class="form-label" for="firstName">Title</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="file" id="image" name="image" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Image</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="file" id="subimage" name="subimage" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Sub Image</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="description" name="description" />
                    <label for="birthdayDate" class="form-label">Description</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="date" id="date" name="date" class="form-control form-control-lg"  />
                    <label class="form-label" for="emailAddress">Date</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="address" name="address" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Address</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-12">

                  <select class="select form-control-lg" name="category" >
                  <option value="1" disabled>--Select Category--</option>
                    <?php 
                        include('../../db/connection.php');
                        $query = mysqli_query($conn, "select * from category");
                        while ($row = mysqli_fetch_array($query))
                        {
                            $category=$row['Category'];
                            ?>
                            <option><?php echo $category?></option>
                        <?php
                        }
                        ?>
                  </select>
                  <label class="form-label select-label">Category</label>

                </div>
              </div>
              <div class="col-md-6 mb-4 pb-2">
              <div class="form-outline">
                    
                    <label class="form-label" for="phoneNumber"></label>
                  </div>
              <div class="form-outline">
                    
                    <label class="form-label" for="phoneNumber"></label>
                  </div>
                  <div class="form-outline">
                    <input type="text" id="uploaded" name="uploaded" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Uploaded by</label>
                  </div>

                </div>
              
              <div class="mt-4 pt-2 my-3">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" name="submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
</body>
</html>
<?php
include('../../db/connection.php');

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $subimage = $_FILES['subimage']['name'];
    $tmp_image1 = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $address = $_POST['address']; 
    $uploaded = $_POST['uploaded']; 
    move_uploaded_file($tmp_image, "../../images/$image"); 
    move_uploaded_file($tmp_image1, "../../images/sub_images/$image"); 

    $query = "INSERT INTO news (title, image, subimage, description, date, category, Address, Uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $title, $image, $subimage, $description, $date, $category, $address, $uploaded); 
    
    $result = mysqli_stmt_execute($stmt); 

    if($result) {
        echo '<script>alert("News Added Successfully");</script>';
    } else {
        echo '<script>alert("Failed to add News");</script>'; 
    }
    
    mysqli_stmt_close($stmt);
}
?>


