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
    <title>Student | Forum Replies</title>
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
                <h1 class="page-head-line">View Replies</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        View Replies
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">

<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="onlinecourse"; // Database name 
$tbl_name="fquestions"; // Table name 

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,$db_name)or die("cannot select DB");

// get value of id that sent from address bar 

$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);
?>

<table class="table">
<tr>
<td><table class="table">
<tr>
<td><?php echo $rows['topic']; ?></td>
</tr>

<tr>
<td<?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td>By : <?php echo $rows['name']; ?> Email : <?php echo $rows['email'];?></td>
</tr>

<tr>
<td>Date/time : <?php echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<BR>

<?php

$tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2 = mysqli_query($con,$sql2);
while($rows=mysqli_fetch_array($result2)){
?>

<table class="table">
<tr>
<td><table class="table">
<tr>
<td>ID</td>
<td>:</td>
<td><?php echo $rows['a_id']; ?></td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td><?php echo $rows['a_name']; ?></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><?php echo $rows['a_email']; ?></td>
</tr>
<tr>
<td>Answer</td>
<td>:</td>
<td><?php echo $rows['a_answer']; ?></td>
</tr>
<tr>
<td>Date/Time</td>
<td>:</td>
<td><?php echo $rows['a_datetime']; ?></td>
</tr>
</table></td>
</tr>
</table><br>
<?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($con, $sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];

// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($con,$sql4);
}

// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($con,$sql5);
mysqli_close($con);
?>

<BR></div></div></div></div></div>
<div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Post Answer
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
<form name="form1" method="post" action="add_answer.php">

<label>Name :</label>
<input name="a_name" class="form-control" type="text" id="a_name" size="45">
<label>Email :</label>
<input name="a_email" class="form-control" type="text" id="a_email" size="45">
<label>Answer:</label>
<textarea name="a_answer" class="form-control" cols="45" rows="3" id="a_answer"></textarea>

<input name="id" type="hidden" value="<?php echo $id; ?>">
<input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset">

</form>
	  </div></div></div></div></div></div></div></body>

  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>

</html>
<?php } ?>