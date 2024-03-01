<?php
include('../../db/connection.php');
error_reporting(0);
$id = $_GET['edit'];
$query = mysqli_query($conn, "select *from news where id = '$id' ");
while ($row = mysqli_fetch_array($query))
{
    $id = $row['ID'];
    $title = $row['title'];
    $image = $row['image'];
    $description = $row['description'];
    $date = $row['date'];
    $category = $row['category'];
    $address = $row['Address'];

}
?>
<?php
include('../../include/bootstrap/customer_nav.php');
?>