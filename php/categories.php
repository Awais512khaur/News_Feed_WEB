<?php
// if($_SESSION['email']==true)
// {
// }
// else
// {
//   header('location:admin.php');
// }
include('../include/bootstrap/nav.php');
$page='category';
?>
<head>
  <link href="../style/categories.css" type="text/css" rel="stylesheet" >
    <title>Categories</title>
</head>
<div class="bt1">
<a href="addcategories.php" ><input class="btn" type="button" value="Add Category">Add Category</input></a>
  </div>
<?php
include('../include/bootstrap/footer.php');
?>
<?php
include('../db/connection.php');
?>