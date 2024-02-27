<?php
// if($_SESSION['email']==true)
// {
// }
// else
// {
//   header('location:admin.php');
// }
include('../include/bootstrap/nav.php');
// $page='category';
?>
<head>
  <link href="../style/categories.css" type="text/css" rel="stylesheet" >
    <title>Categories</title>
</head>

<form action="categories.php" name="categoryform" method="post" onsubmit="return validateForm()" style="height: 432px;" >
    <h2>Add Category</h2>
    <hr>
    <div class="login">
        <input type="text" name="Category" class="input" id="category" placeholder="Add category">
        <div id="error" style="color: red;"></div> 
        <textarea name="Description" class="input" id="desc" placeholder="Description"></textarea>
        <div id="error1" style="color: Blue;"></div> 
    </div>
    <button type="submit" name="submit">Add Category</button>
</form>
<script src="../JS/validation.js" >
</script>

<?php
include('../db/connection.php');

if(isset($_POST['submit'])) {
    $Category = $_POST['Category'];
    $Description = $_POST['Description'];

    $query = mysqli_query($conn, "INSERT INTO category ('Category', 'Description') VALUES ('$Category', '$Description')");
    if($query) {
        echo '<script>alert("Category Added Successfully");</script>';
    } else {
        echo '<span style="color:red;">Failed Try Again</span>'; 
    }
}
?>

<?php
include('../include/bootstrap/footer.php');
?>
