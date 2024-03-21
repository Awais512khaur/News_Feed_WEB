<?php
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $subimage = $_FILES['subimage']['name'];
    $tmp_subimage = $_FILES['subimage']['tmp_name']; 
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category_id = $_POST['category'];
    $address = $_POST['address']; 
    $uploaded = $_POST['uploaded'];
    move_uploaded_file($tmp_image, "../../images/$image");
    move_uploaded_file($tmp_subimage, "../../sub_images/$subimage");
    $query = "INSERT INTO news (title, image, subimage, description, date, Address, Uploaded_by) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die('Error preparing statement: ' . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, 'sssssss', $title, $image, $subimage, $description, $date, $address, $uploaded);
    $result = mysqli_stmt_execute($stmt);
    if($result) {
        $news_id = mysqli_insert_id($conn);
        $query_category = "INSERT INTO news_category (news_id, category_id) VALUES (?, ?)";
        $stmt_category = mysqli_prepare($conn, $query_category);
        if (!$stmt_category) {
            die('Error preparing statement: ' . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt_category, 'ii', $news_id, $category_id);
        $result_category = mysqli_stmt_execute($stmt_category);
        if($result_category) {
            echo '<script>alert("News Added Successfully");</script>';
        } else {
            echo '<script>alert("Failed to add News to Category");</script>'; 
        }
        mysqli_stmt_close($stmt_category);
    } 
    else {
        echo '<script>alert("Failed to add News");</script>'; 
    }
    mysqli_stmt_close($stmt);
    header("Location: todaynews.php");
    exit(); 
}

