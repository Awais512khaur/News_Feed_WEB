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
  <link href="../style/categories.css" type="text/css" rel="stylesheet" >
    <title>Categories</title>
</head>
<style>
</style>
<form action="addcategories.php" name="categoryform" method="post" onsubmit="return validateForm()" style="height: 432px;" >
    <h2>Add Category</h2>
    <hr>
    <div class="login">
        <input type="text" name="category" class="input" id="category" placeholder="Add category">
        <div id="error" style="color: red;"></div> 
        <textarea name="description" class="input" id="description" placeholder="Description"></textarea>
        <div id="error1" style="color: Blue;"></div> 
    </div>
    <button type="submit" name="submit">Add Category</button>
</form>
</body>
<script>
     function validateForm() {
        return false;
    }
</script>
<script src="../JS/validation.js" >
</script>
<?php
include('../db/connection.php');
if(isset($_POST['submit'])) {
    $Category = $_POST['category'];
    $Description = $_POST['description'];
    $check = mysqli_query($conn, "SELECT * FROM category WHERE Category = '$Category'");
    if(mysqli_num_rows($check) > 0) {
        echo '<script>alert("Category already exists");</script>';
        exit();
    }
    $query = mysqli_query($conn, "INSERT INTO category (Category, Description) VALUES ('$Category', '$Description')");
    if($query) 
    {
        echo '<script>alert("Category Added Successfully");</script>';
    } 
    else
    {
        echo '<script>alert("Failed to add category");</script>'; 
    }
    echo '<script>event.preventDefault();</script>';
} 
?> 

<?php
// include('../include/bootstrap/foot.php')
?>
