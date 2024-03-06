<?php
include('../include/bootstrap/nav.php');
include('../db/connection.php');
?>

<h1 style="margin-left: 45rem;margin-top: 5%;" >User Info</h1>

 <table class="table table-bordered" style="margin-left: 16rem;width: 78rem;margin-top: 40px;">
 <thead class="thead-dark">
 <tr>
   <th scope="col">ID</th>
   <th scope="col">Name</th>
   <th scope="col">Email</th>
   <th scope="col">Password</th>
 </tr>
   <?php
   $query = mysqli_query($conn, "select * from registration  ");
   while($row= mysqli_fetch_array($query))
   {
   
   ?>
  <tr>
     <td><?php echo $row['ID']?></td>
     <td><?php echo $row['Name']?></td>
     <td><?php echo $row['Email']?></td>
     <td><?php echo $row['Password']?></td>
  </tr>
  <?php } ?>
 </table>
 <table>
  </table>
