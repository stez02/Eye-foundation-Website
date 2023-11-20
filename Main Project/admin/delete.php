<?php
include 'conn.php';

$donor_id = $_GET['id'];
$sql = "DELETE FROM donor_details WHERE donor_id = {$donor_id}";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<script>
  alert("Data deleted from the database."); 
  window.location = "donor_list.php"; 
</script>
