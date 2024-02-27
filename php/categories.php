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
    <link href="../style/table.css" type="text/css" rel="stylesheet" > 
    <title>Categories</title>
</head>
<div class="bt1">
<a href="addcategories.php" ><input class="btn" type="button" value="Add Category">Add Category</input></a>
  </div>
  <div>
    <table class="table table-bordered" >
    <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      
    </tr>
      <?php
      include('../db/connection.php');
      $query = mysqli_query($conn, "select * from category");
      while($row= mysqli_fetch_array($query))
      {

      ?>
      <tr scope="row">
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Category']; ?></td>
        <td><?php echo $row['Description']; ?></td>
        <td><a href="edit.php?edit=<?php echo $row['ID'];?>" class="badge badge-info">UPDATE</a></td>
        <td><a href="delete.php?del=<?php echo $row['ID'];?>"  class="badge badge-danger">DELETE</a></td>
      </tr>
      <?php  } ?>
    </table>
  </div>
<?php
include('../include/bootstrap/footer.php');
?>
<?php
include('../db/connection.php');
?>