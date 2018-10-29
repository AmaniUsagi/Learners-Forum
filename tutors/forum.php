<?php
session_start();
require_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['tlogin'])==0){
    header('locatiion:index.php');
} else {
    date_default_timezone_set('Africa/Nairobi');
    $currentTime = date('d-m-Y h:i:s A', time());
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tutors | Forum</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<?php include('includes/header.php'); ?>
<?php if ($_SESSION['tlogin'] != "") {
        include('includes/menubar.php');
    }
    ?>
<div class="container-wrapper">
    <div class="container">
        <div class="col-md-12">
            <h1 class="page-head-line"> Discussion Forum</h1>
        </div>
        <?php include('includes/forum-menu.php') ?>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel panel-heading" id="myHeader">
                    <h4>Posted Questions</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <tbody>
                                <?php
                                $sql=mysqli_query($con,"select students.studentName as sname, tblpost.question as quest, tblpost.postDate as pdate from students join tblpost on tblpost.userid=students.StudentRegno");
                                $cnt=1;
                                while($row=mysqli_fetch_array($sql)){
                                    ?>
                                <tr> 
                                    <td><?php echo $cnt;?></td>
                                    <td><?php echo htmlentities($row['sname']);?></td>
                                    <td><?php echo htmlentities($row['quest']);?></td>
                                    <td><?php echo htmlentities($row['pdate']);?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="details.php?id=<?php echo $row['id']?>">view</a>
                                    </td>
                                <tr>
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

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>
</html>