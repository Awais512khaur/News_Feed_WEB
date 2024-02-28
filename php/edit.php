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
$query = mysqli_query($conn, "select * from category where id='$id'");
while($row = mysqli_fetch_array($query)) {
    $category = $row['Category']; // Use lowercase 'Category' here
    $description = $row['Description']; // Use lowercase 'Description' here
}
?>
<head>
  <link href="../style/categories.css" type="text/css" rel="stylesheet" >
    <title>Categories</title>
</head>
<form action="edit.php" name="categoryform" method="post" onsubmit="return validateForm()" style="height: 432px;" >
    <h2>Update Category</h2>
    <hr>
    <div class="login">
    <input type="text" name="category" class="input" id="category" placeholder="Add category" value="<?php echo $category ?>" >
        <div id="error" style="color: red;"></div> 
        <textarea name="description" class="input" id="description" placeholder="Description"  ><?php echo $description?></textarea>
        <input  type="hidden" name="id" value="<?php echo$_GET['edit'] ?>" >
        <div id="error1" style="color: Blue;"></div> 
    </div>
    <button type="submit" name="submit"  id="alert" >Update Category</button>
    <label id="myLabel" style="color:blueviolet;margin-top: 10rem; display:none;margin-left: 68px;">Category updated Successfully</label>

</form>
<script>
var label = document.getElementById('myLabel');
var submitButton = document.getElementById('alert');

// submitButton.addEventListener('click', function() {
//     // alert('Category updated Successfully');
// });
// submitButton.addEventListener('click', function() {
//     window.location.href = 'categories.php';
// });


</script>
<script src="../JS/validation.js" >
</script>
?>
<?php
include('../db/connection.php');
if(isset($_POST["submit"]))
{
    $id=$_POST['id'];
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
