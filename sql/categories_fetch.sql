<?php 
include('../../db/connection.php');
$query = mysqli_query($conn, "select * from category");
while ($row = mysqli_fetch_array($query))
{
    $category=$row['Category'];
    ?>
    <option><?php echo $category?></option>
<?php
}
?>