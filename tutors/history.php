<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['tlogin'])==0){   
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
    <title>Tutor | Enrollment</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
<?php if($_SESSION['tlogin']!=""){
    include('includes/menubar.php');
}
 ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Enrollment History  </h1>
            </div>
        </div>
        <div class="row" >
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Enrollment history
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name </th>
                                        <th>Session </th>
                                        <th>Department</th>
                                        <th>Semester</th>
                                        <th>Enrollment Date</th>
                                    </tr>
                                </thead>
                            <tbody>
<?php
    $sql=mysqli_query($con,"select tutorenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,tutorenrolls.enrollDate as edate ,session.semester as sem from tutorenrolls join course on course.id=tutorenrolls.course join session on session.id=tutorenrolls.session join department on department.id=tutorenrolls.department where tutorenrolls.tutorRegno='".$_SESSION['tlogin']."'");
    $cnt=1;
    while($row=mysqli_fetch_array($sql)){
        ?>
<tr> 
    <td><?php echo $cnt;?></td>
    <td><?php echo htmlentities($row['courname']);?></td>
    <td><?php echo htmlentities($row['session']);?></td>
    <td><?php echo htmlentities($row['dept']);?></td>
    <td><?php echo htmlentities($row['sem']);?></td>
    <td><?php echo htmlentities($row['edate']);?></td>
</tr>
<?php 
$cnt++;
} ?>

                                </tbody>
                            </table>
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
