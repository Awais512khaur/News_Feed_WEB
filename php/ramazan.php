<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/ramzan.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Ramzan Timing</title>
</head>
<body>
    <h1 style="margin-left: 35rem;margin-top: 6rem;" >Ramadan Timing</h1>
    <div class="container" id="container">
        <video autoplay loop muted >
            <source src="../video/ramadan.mp4" type="video/mp4" >
        </video>
        <div class="text_box" style="font-size: 100px;" >
            <h1 class="ramadan" >Ramadan</h1>
        </div>
    </div>
 <table class="table table-bordered" style="margin-left: 31rem; width: 30rem;margin-top:60px" >
 <thead class="thead-dark">
 <tr>
   <th scope="col">ID</th>
   <th scope="col">Date</th>
   <th scope="col">Sehri</th>
   <th scope="col">Iftar</th> 
   
 </tr>
   <?php
   include('../db/connection.php');
   $query = mysqli_query($conn, "select * from ramaza  ");
   while($row= mysqli_fetch_array($query))
   {
   
   ?>
  <tr>
     <td><?php echo $row['ID']?></td>
     <td><?php echo $row['Date']?></td>
     <td><?php echo $row['Sehr']?></td>
     <td><?php echo $row['Iftar']?></td>
  </tr>
  <?php } ?>
 </table>
 <script>
       document.addEventListener("DOMContentLoaded", function() 
    {
        var container = document.getElementById("container");
        setTimeout(function() {
            container.style.display = "none";
        }, 1000); // 3000 milliseconds = 3 seconds
    });
 </script>
</body>
</html>