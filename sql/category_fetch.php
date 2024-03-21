<?php 
include('../../db/connection.php');
$query = mysqli_query($conn, "select * from category");
while ($row = mysqli_fetch_array($query))
{
    $id=$row['ID'];
    $category=$row['Category'];
    ?>
    <option value="<?php echo $id; ?>"><?php echo $id . ' - ' . $category; ?></option>
<?php
}
?>