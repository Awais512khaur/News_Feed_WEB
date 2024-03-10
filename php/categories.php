<?php
// if($_SESSION['email']==true)
// {
// }
// else
// {
//   header('location:admin.php');
// }
include('../include/bootstrap/nav.php');
$page='categories';
?>
<head>
    <link href="../style/categories.css" type="text/css" rel="stylesheet" >
    <link href="../style/table.css" type="text/css" rel="stylesheet" > 
    <title>Categories</title>
</head>
<button onclick="printCategory()" id="btn" style="margin-left: 25rem;" >Download Report</button>
  <div>
  <h1 style="margin-left: 45rem;margin-top: 9%;" >Categories</h1>
 
    <table class="table table-bordered"  style="margin-top: 40px;" id="category" >
    <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
      <?php
      include('../db/connection.php');
      $query = mysqli_query($conn, "select * from category");
      while($row= mysqli_fetch_array($query))
      {

      ?>
      <tr scope="row">
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Category']; ?></td>
        <td><?php echo substr ($row['Description'], 0,20); ?> ...</td>
        <td><a href="edit.php?edit=<?php echo $row['ID'];?>" class="badge badge-info">UPDATE</a></td>
        <td><a class="badge badge-danger" href="#" onclick="confirmDelete(<?php echo $row['ID']; ?>)">Delete News</a></td>
      </tr>
      <?php  } ?>
    </table>
  </div>
  <script>
function printCategory() {
    var categoryTable = document.getElementById('category').outerHTML;
    var tempDiv = document.createElement('div');
    tempDiv.innerHTML = categoryTable;
    var rows = tempDiv.querySelectorAll('tr');
    rows.forEach(function(row) {
        row.removeChild(row.lastElementChild);
        row.removeChild(row.lastElementChild);
    });
    var tableHTML = tempDiv.innerHTML;
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Category Report</title></head><body>');
    printWindow.document.write('<h1>Category Report</h1>');
    printWindow.document.write('<table border="1">' + tableHTML + '</table>');
    printWindow.document.write('</body></html>');
    printWindow.print();
}
</script>
  <script>
    function confirmDelete(newsId) {
    if (confirm("Are you sure you want to delete this category?")) {
        window.location.href = "delete.php?del=" + newsId;
    }
}
  </script>
<?php
include('../include/bootstrap/footer.php');
?>
<?php
include('../db/connection.php');
?>