<?php
include('../../include/bootstrap/customer_nav.php');
?>
<?php
include('../../db/connection.php');
?>
<head>
  <style>
    a
    {
      text-decoration: none;
      color: black;
    }
  </style>
</head>
 <h6 style="    margin-left: 45rem;margin-top: -52%;" >.</h6>
 <div  role="alert" style="margin-top: -33%;" >
    <marquee style="font-size: 2rem;" > Today's News !</marquee>
    </div>
 <table class="table table-bordered" style="margin-left: 32rem;width: 78rem;margin-top: 40px;">
 <thead class="thead-dark" >
 <tr>
   <th scope="col">ID</th>
   <th scope="col">Title</th>
   <th scope="col">Image</th>
   <th scope="col">Sub Image</th>
   <th scope="col">Description</th>
   <th scope="col">Date</th>
   <th scope="col">category</th>
   <th scope="col">Address</th>
   <th scope="col">Uploaded by</th>
 </tr>
   <?php
   $query = mysqli_query($conn, "SELECT * FROM news ");
   while($row= mysqli_fetch_array($query))
   {
   
   ?>
  <tr>
     <td><?php echo $row['ID']?></td>
     <td><?php echo $row['title']?></td>
     <td><img style="width: 10rem;" src="../../images/<?php echo $row['image']; ?>"  alt="No Image to dispaly" ></td>
     <td><img style="width: 10rem;" src="../../sub_images/<?php echo $row['subimage']; ?>"  alt="No Image to dispaly" ></td>
     <td><?php echo  substr( $row['description'], 0, 20)?>...</td>
     <td><?php echo date("F jS, y" , strtotime($row['date']))?></td>
     <td><?php echo $row['category']?></td>
     <td><?php echo $row['Address']?></td>
     <td><?php echo $row['Uploaded_by']?></td>
  </tr>
  <?php } ?>
 </table>

</div>

</div>
