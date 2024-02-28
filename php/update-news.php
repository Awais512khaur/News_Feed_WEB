<?php
// if($_SESSION['email']==true)
// {
// }
// else
// {
//   header('location:admin.php');
// }
// $page='category';
error_reporting(0);
include('../include/bootstrap/nav.php');
?>
<?php
include('../db/connection.php');
$id = $_GET['edit'];
$query = mysqli_query($conn, "select * from news where id='$id'");
while($row = mysqli_fetch_array($query)) {
    $title = $row['title']; 
    $image = $row['image']; 
    $description = $row['description']; 
    $date = $row['date']; 
    $category = $row['category']; 
    $address = $row['Address']; 
}
?>
<head>
  <link href="../style/breadcrum.css" type="text/css" rel="stylesheet" >
  <link href="../style/form.css" type="text/css" rel="stylesheet">
  <link href="../style/inputs.css" type="text/css" rel="stylesheet" >
    <title>Categories</title>
</head>
<form action="updatenews.php" name="categoryform" id="newsform" method="post" onsubmit="return validateForm()" " >
<div class="bread-crum-div" >
    <ul class="breadcrumb" >
        <Li class="breadcrumb-item active" ><a href="news.php" >NEWS</a>
        </Li>
        <Li class="breadcrumb-item active" ><a href="addnews.php" >Add NEWS</a>
        </Li>
    </ul>
</div>
    <h2>UPDATE NEWS</h2>
    <hr>
    <div class="alert alert-info" role="alert">
    *All fields are mandatory
</div>
    <div class="login">
        <input class="input"  type="text" name="title"  id="title" placeholder="Title"> 
        <input  class="input" type="text" name="image"  id="image" placeholder="Image">
        <textarea class="input" name="description"  id="description" placeholder="Description"></textarea>
        <input class="input" type="date" name="date"  id="date" placeholder="Date">
        <div>
            <select name="category" id="category" placeholder="Select Category"  >
            <option>--Select Category--</option>
            <?php 
            include('../db/connection.php');
            $query = mysqli_query($conn, "select * from news");
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
    </div>
    <button type="submit" name="submit">UPDATE NEWS</button>
</form>
<script src="../JS/newsvalidation.js" >
</script>
?>
<?php
include('../db/connection.php');
if(isset($_POST["submit"]))
{
    $id=$_POST['ID'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $query1=mysqli_query($conn,"update category set category='$category', description='$description' where id='$id'");
    if($query1)
    {
        echo "<script>alert('Category updated successfully');</script>";
        echo "<script>window.location='http://localhost/News_Feed_WEB/php/categories.php'</script>";
    }
    else
    {
        echo '<script>alert("Not updated");</script>';
    }
}
?>
<?php
include('../include/bootstrap/footer.php');
?>
