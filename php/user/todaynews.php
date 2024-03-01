
<?PHP

?>
<?php
include('../../include/bootstrap/customer_nav.php');
?>
<?php
include('../../db/connection.php');
?>

 <h1 style="    margin-left: 45rem;margin-top: -52%;" >.</h1>
 <div class="alert alert-info" role="alert">
                    <marquee style="    font-size: 3rem;" > Today's News !</marquee>
                    </div>
 <table class="table table-bordered" style="margin-left: 32rem;width: 78rem;margin-top: 40px;">
 <thead class="thead-dark">
 <tr>
   <th scope="col">ID</th>
   <th scope="col">Title</th>
   <th scope="col">Image</th>
   <th scope="col">Description</th>
   <th scope="col">Date</th>
   <th scope="col">category</th>
   <th scope="col">Address</th>
   <th scope="col">Uploaded by</th>
 </tr>
   <?php
   // include('../db/connection.php');
   // $page = $_GET[ ' page '];
   // if($page == ''|| $page=="1")
   // {
   //   $page1 =0;
   // }
   // else{
   //   $page1 = ($page * 3)-3;

   // }
   $query = mysqli_query($conn, "select * from news  ");
   while($row= mysqli_fetch_array($query))
   {
   
   ?>
  <tr>
     <td><?php echo $row['ID']?></td>
     <td><?php echo $row['title']?></td>
     <td><img style="width: 10rem;" src="../../images/<?php echo $row['image']; ?>"  alt="No Image to dispaly" ></td>
     <td><?php echo  substr( $row['description'], 0, 20)?>...</td>
     <td><?php echo date("F jS, y" , strtotime($row['date']))?></td>
     <td><?php echo $row['category']?></td>
     <td><?php echo $row['Address']?></td>
     <td><?php echo $row['Uploaded_by']?></td>
  </tr>
  <?php } ?>
 </table>
 <table>
 <ul class="pagination">
 <!-- <label><?php echo $count ?></label>
 <?php 
 //  $sql = mysqli_query($conn, "select * from news");
 //  $count = mysqli_num_rows($sql);
 //  $a=$count/3;
 //  $a = ceil($a);
 //  for ($i= 0; $i<$a; $i++)
 //  {
   ?>
     <li class="page-items" ><a href="news.php?pahe=<?php echo $i; ?>" class="page-link" ><?php echo $i ?></a></li>
  <?php // } ?> -->
 </ul>
  </table>
</div>
