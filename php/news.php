<?php
include('../include/bootstrap/nav.php');
?>

<head>
    <link href="../style/categories.css" type="text/css" rel="stylesheet">
    <link href="../style/table.css" type="text/css" rel="stylesheet">
    <title>Breaking News</title>
    <style>
        td {
            width: 20rem;
        }
    </style>
</head>

<div class="bt1">
    <a><input class="btn" type="button" value="." style="display: none;">.</input></a>
</div>
<div>
    <h1 style="margin-left: 45rem;margin-top: 5%;">Breaking News</h1>

    <table class="table table-bordered" style="margin-left: 16rem;width: 78rem;margin-top: 40px;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">SubImages</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Category</th>
                <th scope="col">Address</th>
                <th scope="col">Uploaded</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>

            </tr>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM news");
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $row['ID'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><img style="width: 10rem;" src="../images/<?php echo $row['image']; ?>" alt="No Image to dispaly"></td>
                    <td><img style="width: 10rem;" src="../sub_images/<?php echo $row['subimage']; ?>" alt="No Image to dispaly"></td>
                    <td><?php echo substr($row['description'], 0, 20) ?>...</td>
                    <td><?php echo date("F jS, Y", strtotime($row['date'])) ?></td>
                    <?php
                    $categoryQuery = "SELECT category.Category 
                                      FROM news_category 
                                      INNER JOIN category ON news_category.category_id = category.ID 
                                      WHERE news_category.news_id = " . $row['ID'];
                    $categoryResult = mysqli_query($conn, $categoryQuery);
                    if ($categoryResult) 
                    {
                        if (mysqli_num_rows($categoryResult) > 0) {
                            $categoryRow = mysqli_fetch_assoc($categoryResult);
                            $category_name = $categoryRow['Category'];
                            echo "<td>$category_name</td>";
                        } else 
                        {
                            echo "<td>No category found</td>";
                        }
                    } else 
                    {
                        echo "<td>Error: " . mysqli_error($conn) . "</td>";
                    }
                    ?>
                    <td><?php echo $row['Address'] ?></td>
                    <td><?php echo $row['Uploaded_by'] ?></td>
                    <td><a class="badge badge-info" href="update-news.php?edit=<?php echo $row['ID'] ?>">Update News</a></td>
                    <td><a class="badge badge-danger" href="#" onclick="confirmDelete(<?php echo $row['ID']; ?>)">Delete News</a></td>
                </tr>
            <?php } ?>
    </table>
    <table>
    </table>

</div>
<script>
    function confirmDelete(newsId) {
        if (confirm("Are you sure you want to delete this news?")) {
            window.location.href = "newsdelete.php?del=" + newsId;
        }
    }
</script>

<?php
include('../include/bootstrap/footer.php');
?>
