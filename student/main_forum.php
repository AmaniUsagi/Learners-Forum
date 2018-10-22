<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0){   
    header('location:index.php');
}else{
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student | Discussion Forum</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Discussion Forum</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Discussion Forum
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Topic</th>
                                        <th>Views </th>
                                        <th>Replies</th>
                                        <th>Date/Time</th>
                       </tr>
                                </thead>
                            <tbody>
<?php
   $host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="onlinecourse"; // Database name 
$tbl_name="fquestions"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,"$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysqli_query($con,$sql);
    while($rows=mysqli_fetch_array($result)){
        ?>
<tr>
    <td><?php echo $rows['id'];?></td>
    <td><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo htmlentities($rows['topic']);?></td>
    <td><?php echo htmlentities($rows['view']);?></td>
    <td><?php echo htmlentities($rows['reply']);?></td>
    <td><?php echo htmlentities($rows['datetime']);?></td>
</tr>

<?php 

} ?>

                                </tbody>
                            </table>
<a href="new_topic.php"><button type="button" name="newtopic" class="btn btn-success center-block">Create New Topic</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
