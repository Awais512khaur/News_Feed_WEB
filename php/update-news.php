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
error_reporting(0);
?>
<?PHP
include('../db/connection.php');
$id = $_GET['edit'];
$query = mysqli_query($conn, "select *from news where id = '$id' ");
while ($row = mysqli_fetch_array($query))
{
    $id = $row['ID'];
    $title = $row['title'];
    $image = $row['image'];
    $subimage = $row['subimage'];
    $description = $row['description'];
    $date = $row['date'];
    $category = $row['category'];
    $address = $row['Address'];

}
?>
<head>
  <link href="../style/form.css" type="text/css" rel="stylesheet" >
  <link href="../style/inputs.css" type="text/css" rel="stylesheet" >
  <link href="../style/breadcrum.css" type="text/css" rel="stylesheet" >
    <title>Add News</title>
</head>
<style>
</style>  

<form action="update-news.php" name="categoryform" id="newsform" enctype="multipart/form-data" method="post" onsubmit="return validateForm()" style="height: 55rem;width:51%" >

    <h2>UPDATE NEWS</h2>
    <hr>
    <div class="alert alert-info" role="alert">
    *All fields are mandatory
</div>
    <div class="login">
        <input class="input"  type="text" name="title"  id="title" placeholder="Title" value="<?php echo $title ?>" > 
        <input  class="input" type="file" name="image"  id="image" placeholder="Image" value="<?php echo $image ?>"  >
        <div style="display: flex; " >
        <img src="../images/<?php echo $image ?>" style="    margin-left: 73px; width: 160px;" >
        </div>
        <input  class="input" type="file" name="image"  id="image" placeholder="Image" value="<?php echo $image ?>"  >
        <div style="display: flex; " >
        <img src="../sub_images/<?php echo $subimage ?>" style="    margin-left: 73px; width: 160px;" >
        </div>
        <textarea class="input" name="description"  id="description" placeholder="Description"  ><?php echo $description ?></textarea>
        <input class="input" type="date" name="date"  id="date" placeholder="Date" value="<?php echo $date ?>" >
        <div>
            <input type="hidden" name="id" value="<?php echo $_GET['edit'];  ?>" >
            <select name="category" id="category" placeholder="Select Category"    >
            <option>--Select Category--</option>
            <?php 
            include('../db/connection.php');
            $query = mysqli_query($conn, "select * from category");
            while ($row = mysqli_fetch_array($query))
            {
                $category=$row['Category'];
                ?>
                <option><?php echo $category; ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <input class="input" class="btn btn-primary" type="text"  name="thumbnail"  id="thumbnail" placeholder="Address" value="<?php echo
        $address ?>" > 
    </div>
    <button type="submit" name="submit">UPDATE NEWS</button>
</form>
</body>
<script src="../JS/newsvalidation.js" > </script>
<?php
include('../db/connection.php');

if(isset($_POST['submit'])) {
    $id= $_POST['id'];
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $thumbnail = $_POST['thumbnail'];
    move_uploaded_file($tmp_image, "../images/$image");
    // $sql = mysqli_query($conn, "update news set title='$title', image='$image', description='$description', date='date', category='category', Address='$thumbnail' where id='$id' ");
    $sql = mysqli_query($conn, "UPDATE news SET title='$title', image='$image', description='$description', date='$date', category='$category', Address='$thumbnail' WHERE id='$id'");
    if($sql) {
        echo "<script>alert('News updated successfully')</script>";
        echo "<script>window.location='http://localhost/News_Feed_WEb/php/news.php';</script>";
    } else {
        echo "<script>alert('Try Again')</script>";
    }
}
?>



