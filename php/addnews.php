<?php
// if($_SESSION['email']==true)
// {
// }
// else
// {
//   header('location:admin.php');
// }
// $page='category';
include('../include/bootstrap/nav.php');
?>
<head>
  <link href="../style/form.css" type="text/css" rel="stylesheet" >
  <link href="../style/inputs.css" type="text/css" rel="stylesheet" >
  <link href="../style/breadcrum.css" type="text/css" rel="stylesheet" >
    <title>Add News</title>
</head>
<style>
</style>  

<form action="addnews.php" name="categoryform" id="newsform" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" style="height: 48rem;" >

    <h2>ADD NEWS</h2>
    <hr>
    <div class="alert alert-info" role="alert">
    *All fields are mandatory
</div>
    <!-- <label id="error"  name="error"   >*All fields are mandatory</label> -->
    <div class="login">
        <input class="input"  type="text" name="title"  id="title" placeholder="Title"> 
        <input  class="input" type="file" name="image"  id="image" placeholder="Image">
        <input  class="input" type="file" name="subimage"  id="subimage" placeholder="Sub Image">
        <textarea class="input" name="description"  id="description" placeholder="Description"></textarea>
        <input class="input" type="date" name="date"  id="date" placeholder="Date">
        <div>
            <select name="category" id="category" placeholder="Select Category"  >
            <option>--Select Category--</option>
            <?php 
            include('../db/connection.php');
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
        </div>
        <input class="input" class="btn btn-primary" type="text"  name="thumbnail"  id="thumbnail" placeholder="Address"> 
        <input class="input" class="btn btn-primary" type="text"  name="uploaded"  id="uploaded" placeholder="Uploded by"> 
    </div>
    <button type="submit" name="submit">ADD NEWS</button>
</form>
</body>
<script src="../JS/newsvalidation.js" > </script>
<?php
include('../include/bootstrap/footer.php');
?>
<?php
include('../db/connection.php');

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $subimage = $_FILES['subimage']['name'];
    $tmp_subimage = $_FILES['subimage']['tmp_name']; 
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $thumbnail = $_POST['thumbnail'];
    $uploaded = $_POST['uploaded'];
    move_uploaded_file($tmp_image, "../images/$image");
    move_uploaded_file($tmp_subimage, "../sub_images/$subimage"); 
    $query = "INSERT INTO news (title, image, subimage, description, date, category, Address, Uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $title, $image, $subimage, $description, $date, $category, $thumbnail, $uploaded);
    $result = mysqli_stmt_execute($stmt);
    if($result) {
        echo '<script>alert("News Added Successfully");</script>';
    } else {
        echo '<script>alert("Failed to add News");</script>'; 
    }
    mysqli_stmt_close($stmt);
}
?>


