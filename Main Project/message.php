<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

#sidebar{position:relative;margin-top:-20px}
#content{position:relative;margin-left:210px}
@media screen and (max-width: 600px) {
  #content {
    position:relative;margin-left:auto;margin-right:auto;
  }
}
  #he{
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      padding: 3px 7px;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
      align:center
  }
  table {
    width: 70%;
    border-collapse: collapse;
    margin-bottom: 60px;
    align-items: center;
    margin:0 auto;
    color: white;
    position: relative;
    left: 10%;
}
  
table th, table td {
    padding: 8px;
    border: none;
    text-align: center;
}
  
table th {
    background-color: #374c6e;
}
  
table td{
    background-color: antiquewhite;
    color: #374c6e;
    border: solid #374c6e;
}
</style>
</head>
<?php
include 'conn.php';
  include './admin/session.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
  ?>
<body style="color:black">
<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php $active="list";  ?>

</div>
<div id="content" >
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Meeting Booked</h1>

        </div>

      </div>
      <hr>
      <?php
        include 'conn.php';

        $limit = 10;
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $count=$offset+1;
        $sql= "select * from booking ;";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)   {
       ?>

       <div class="table-responsive">
      <table class="table table-bordered" style="text-align:center">
          <thead style="text-align:center">
          <th style="text-align:center">S.no</th>
          <th style="text-align:center">Name</th>
          <th style="text-align:center">Email</th>
          <th style="text-align:center">Location</th>
          <th style="text-align:center">Date</th>
          <th style="text-align:center">Time Slot</th>
          <th style="text-align:center">Donor Name</th>
          <th style="text-align:center">Donor Blood Group</th>

          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['timeslot']; ?></td>
                  <td><?php echo $row['donor_name']; ?></td>
                  <td><?php echo $row['donor_blood']; ?></td>
                    <td id="he" style="width:100px"></td>

              </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
    <?php } ?>





<div class="table-responsive"style="text-align:center;align:center">
    <?php
    $sql1 = "SELECT * FROM booking";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

    if(mysqli_num_rows($result1) > 0){

      $total_records = mysqli_num_rows($result1);

      $total_page = ceil($total_records / $limit);

      echo '<ul class="pagination admin-pagination">';
      if($page > 1){
        echo '<li><a href="donor_list.php?page='.($page - 1).'">Prev</a></li>';
      }
      for($i = 1; $i <= $total_page; $i++){
        if($i == $page){
          $active = "active";
        }else{
          $active = "";
        }
        echo '<li class="'.$active.'"><a href="donor_list.php?page='.$i.'">'.$i.'</a></li>';
      }
      if($total_page > $page){
        echo '<li><a href="donor_list.php?page='.($page + 1).'">Next</a></li>';
      }

      echo '</ul>';
    }
    ?>
  </div>
  </div>
</div>
</div>
</body>
</html>