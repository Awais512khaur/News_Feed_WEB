<?php
include('../../include/bootstrap/customer_nav.php');
?>
<head>
    <link href="../../style/user_dash.css" rel="stylesheet" >
</head>

<div style="margin-top: -112rem;margin-left: 16%;" >
<marquee style="font-size: 3rem;"><b>Welcome to KNN (Khaur News Networks)</b></marquee>
<div style="margin-left: 35rem;" >
<h4 class="fst-italic">Recent News</h4>
<?php 
       include('../../db/connection.php');
         $query = mysqli_query($conn, "SELECT * FROM news WHERE DATE(date) = CURDATE();");
         
         while($row= mysqli_fetch_array($query))
         {
          
         ?>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../../images/<?php echo $row['image']; ?>"  alt="No Image to dispaly">
            <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']?></h5>
            <small class="text-body-secondary"><?php echo date("F jS, y" , strtotime($row['date']))?></small><br>
            <a href="../../php/readmore.php?edit=<?php echo $row['ID']?>" class="btn btn-primary">Read More</a>
            </div>
          </div>  

<?php } ?>
</div>
<hr><br>
<iframe style="margin-left: 25rem;"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13345.396047619146!2d72.46131885!3d33.25735415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df626668f16ab5%3A0x107d11d19cba26da!2sKhaur!5e0!3m2!1sen!2s!4v1709276720208!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
