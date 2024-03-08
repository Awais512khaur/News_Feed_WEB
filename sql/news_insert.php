<?php
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $subimage = $_FILES['subimage']['name'];
    $tmp_image1 = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $address = $_POST['address']; 
    $uploaded = $_POST['uploaded']; 
    move_uploaded_file($tmp_image, "../../images/$image"); 
    move_uploaded_file($tmp_image1, "../../images/sub_images/$image"); 

    $query = "INSERT INTO news (title, image, subimage, description, date, category, Address, Uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $title, $image, $subimage, $description, $date, $category, $address, $uploaded); 
    if($query)
{
    echo "<script>alert('News Added succesfully')</script>";
}
    $result = mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
}

