<?php
// session_start();
// if($_SESSION['email']==true)
// {
// }
// else
// header('location:admin.php');
include('../include/bootstrap/nav.php');
include('../db/connection.php');
$query = mysqli_query($conn, "SELECT COUNT(*) AS num_rows FROM news");
if ($query) {
$result = mysqli_fetch_assoc($query);
if ($result !== null && isset($result['num_rows'])) {
$num_items = $result['num_rows'];
} else {
$num_items = 0; 
}
} else {
$num_items = 0; 
}
$query1 = mysqli_query($conn, "SELECT COUNT(*) AS num_rows FROM category");
if ($query1) {
$category_result = mysqli_fetch_assoc($query1);
if ($category_result !== null && isset($category_result['num_rows'])) {
$num_items1 = $category_result['num_rows'];
} else {
$num_items1 = 0; 
}
} else {
$num_items1 = 0; 
}
$query2 = mysqli_query($conn, "SELECT COUNT(*) AS num_rows FROM  registration");
if ($query2) {
$reg_result = mysqli_fetch_assoc($query2);
if ($reg_result !== null && isset($reg_result['num_rows'])) {
$num_items2 = $reg_result['num_rows'];
} else {
$num_items2 = 0; 
}
} else {
$num_items2 = 0; 
}
?>
<title>Dashboard</title>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<canvas class="my-4 w-100" id="myChart" width="900" height="380" style="display: flex;" ></canvas>
<div style="margin-top: -30rem;margin-left: 78px;gap: 50px;display: flex;" >
<div class="card text-white bg-primary mb-3" style="max-width: auto;">
<div class="card-header">Total Number of News</div>
<div class="card-body">
<p class="card-text">Total news uploaded to KNN (Khaur News<br>  Network) :</p>
<h5 class="card-title"><?php echo $num_items; ?></h5>
<a href="news.php" class="btn btn-primary" >View</a> 
</div>
</div>
<div class="card text-white bg-info mb-3" style="max-width: auto;">
<div class="card-header">Toatal Number of Categories</div>
<div class="card-body">
<p class="card-text">All caetgories in KNN (Khaur News Network) :</p>
<h5 class="card-title"><?php echo $num_items1; ?></h5>
<br>
<a href="categories.php"  class="btn btn-info" >View</a> 
</div>
</div>
<div class="card text-white bg-success mb-3" style="max-width: auto">
<div class="card-header">Total Number of Users</div>
<div class="card-body">
<p class="card-text">No users in KNN (Khaur News Networks) :</p>
<h5 class="card-title"><?php echo $num_items2; ?></h5>
<br>
<a href="user_info.php" class="btn btn-success" >View</a> 
</div>
</div>    
</div>
<hr>
<div style="margin-left: 5rem;" >
<h4 class="fst-italic">Recent News</h4>
<?php 
include('../db/connection.php');
$query = mysqli_query($conn, "SELECT * FROM news WHERE DATE(date) = CURDATE();");
if(mysqli_num_rows($query) > 0) {
while($row = mysqli_fetch_array($query)) {
?>
<div style="display: flex;" >
<ul class="list-unstyled">
<li>
<a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="readmore.php?edit=<?php echo $row['ID']?>">
<img style="width:100% ; height:96px " src="../images/<?php echo $row['image']; ?>"  alt="No Image to display"  >
<div class="col-lg-8">
<h6 class="mb-0"><?php echo $row['title']?></h6>
<small class="text-body-secondary"><?php echo date("F jS, y" , strtotime($row['date']))?></small>
</div>
</a>
</li>
</ul>
</div>
<?php 
}
} else {?>
<div style="display: flex;" >
<ul class="list-unstyled">
<li>
<a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="readmore.php?edit=<?php echo $row['ID']?>">
<img style="width:100% ; height:96px " src="../images/default.webp"  alt="No Image to display"  >
<div class="col-lg-8">
<h6 class="mb-0">No Recent News</h6>
<?php $today_date = date("F jS, Y"); ?>
<small class="text-body-secondary">Date:  <?php echo $today_date; ?></small>
</div>
</a>
</li>
</ul>
</div>  
<?php } ?>
</div>
<div class="table-responsive">
</div>
</main>
</div>
</div>
<?php
include('../include/bootstrap/footer.php')
?>
