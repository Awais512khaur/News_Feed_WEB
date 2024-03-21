<?php
include('../db/connection.php');
$id = $_GET['del'];
$query_news_category = mysqli_query($conn, "DELETE FROM news_category WHERE news_id = '$id'");
$query_news = mysqli_query($conn, "DELETE FROM news WHERE id = '$id'");
if ($query_news && $query_news_category) 
{
} else 
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body
        {
            text-align: center;
            background-color: aqua;
        }
        lord-icon
        {
           margin-top: 15rem;
        }
        h3{
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
    </style>
</head>
<body>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<a href="news.php"><lord-icon
    src="https://cdn.lordicon.com/hjbrplwk.json"
    trigger="morph"
    state="morph-trash-in"
    colors="primary:#a66037,secondary:#e83a30,tertiary:#242424,quaternary:#000000"
    style="width:250px;height:250px">
</lord-icon></a>
<h3>News Deleted Successfully</h3>
</body>
</html>
