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
<script src="../JS/validation.js" >
</script>
<?php
include('../db/connection.php');
if(isset($_POST['submit'])) {
    $Category = $_POST['category'];
    $Description = $_POST['description'];
    $query=mysqli_query($conn, "insert into category(Category,Description)values('$Category','$Description')");
    // $sql = "INSERT INTO category (category, description) VALUES ('$Category', '$Description')";
    // if ($conn->query($sql) === TRUE) {
    //     echo '<script>alert("Category Added Successfully");</script>';
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     echo '<span style="color:red;">Failed Try Again</span>';
    // }
    if($query)
    {
        echo '<script>alert("Category Added Successfully");</script>';
    }
    else
    {
        echo '<script>alert("Failed Try again");</script>'; 
    }
}
?>
<?php
include('../include/bootstrap/footer.php');
?>
