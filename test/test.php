<?php
include('../db/connection.php');

// SQL query to fetch data
$sql = "SELECT * FROM admin_login"; // Adjust your_table and column_name accordingly
$result = $conn->query($sql);

// Check if query returned any rows
$data = array();
if ($result->num_rows > 0) {
    // Fetch data and store it in a variable
    while($row = $result->fetch_assoc()) {
        $data[] = $row['Email'];
    }
} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <style>
        /* Basic CSS for navbar */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>

<!-- Navbar HTML structure -->
<ul>
    <?php foreach ($data as $item): ?>
        <li><a href="#"><?php echo $item; ?></a></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
