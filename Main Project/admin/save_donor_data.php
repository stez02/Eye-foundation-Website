<?php
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];

$conn = mysqli_connect("localhost", "root", "", "donor") or die("Connection error");
$sql = "INSERT INTO donor_details(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address) VALUES ('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}')";
$result = mysqli_query($conn, $sql) or die("Query unsuccessful.");

mysqli_close($conn);
?>

<script>
  alert("Data saved in the database."); // Display pop-up message
  window.location.href = "http://localhost/Project/kidneydonorwebsite/admin/donor_list.php"; // Redirect to the desired page
</script>
