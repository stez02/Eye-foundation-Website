
<?php
include 'conn.php';

$que_id = $_GET['id'];
$sql = "DELETE FROM contact_query WHERE query_id = {$que_id}";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<script>
  alert("Data deleted from the database."); // Display the pop-up message
  window.location = "query.php"; // Redirect to another page
</script>
