<?php 
  include 'conn.php';
  $dblood;$dname;
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $location=$_POST['location'];
        $date=$_POST['date'];
        $time=$_POST['timeslot'];
        $dname=$_POST['donor_name'];
        $dblood=$_POST['donor_blood'];
  $query="INSERT into booking (name,email,location,date,timeslot,donor_name,donor_blood) VALUES ('$name', '$email','$location','$date','$time','$dname','$dblood');";
  if (mysqli_query($conn,$query))
  {
    echo "<script>alert('Booking Confirmed and You will be notified personally in your mail');</script>";
  }
  else{
    echo "Error:" .$sql."<br>".mysqli_error($conn);
  }
    }

   // $donorid=$_GET['id'];
    //$sql="SELECT * FROM donor_details where donor_id='$donorid';";
    //$result=mysqli_query($conn,$sql);
    //$row=mysqli_fetch_assoc($result);
    //$donorname=$row['donor_name']; 
  ?>


<!DOCTYPE html>
<html>
<head>
  <title>Booking Slot Page</title>
  <style>
  body {
      font-family: Arial, sans-serif;
      background: #000;
     
    }

    #background-video {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      object-fit: cover;
    }

    h1 {
      color: #000;
      text-align: center;
    }
    nav {
      background-color: blue;
      padding: 10px;
      text-align: center;

    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border: 1px solid #ccc;
      animation: fadeIn 1s ease-in-out;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);

    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
<video id="background-video" autoplay muted loop>
    <source src="./sample/Background video.mp4" type="video/mp4">
    <!-- Add more source elements for different video formats if needed -->
  </video>

  <nav>
    <a href="home.php">Visionary Eye Foundation</a>
  </nav>
  <h1>Booking Slot Page</h1>
  <form  method="POST">
     Bookers details
     <label for="name">Name</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="donor_name"> Your place:</label>
    <input type="text" id="dname" name="donor_name" required ><br><br>
    <label for="donor_blood">Blood Group:</label>
    <input type="text" id="dblood" name="donor_blood" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="location">Location For Meeting:</label>
    <input type="text" id="location" name="location" required value="Vasundara Eye Foundation" readonly><br><br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br><br>
    <label for="timeslot">Select a time slot:</label>
    <select id="timeslot" name="timeslot" required>
      <option value="9:00 AM">9:00 AM</option>
      <option value="10:00 AM">10:00 AM</option>
      <option value="11:00 AM">11:00 AM</option>
      <option value="12:00 PM">12:00 PM</option>
      <!-- Add more time slots as needed -->
    </select><br><br>

    <input type="submit" value="Book Slot">
  </form>


