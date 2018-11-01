<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Students | Forum</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/forum.css" rel="stylesheet" />
</head>
<body>
<?php include('includes/header.php'); ?>
<?php if ($_SESSION['login'] != "") {
        include('includes/menubar.php');
    }
    ?>
<div class="container-wrapper">
    <div class="container">
        <div class="col-md-12">
            <h1 class="page-head-line"> Discussion Forum</h1>
        </div>
        <?php include('includes/forum-menu.php') ?>
        <div class="invoice-box">
            <?php
                $cid = intval($_GET['id']);
                $sql = mysqli_query($con, "select course.courseName as cname, course.courseCode as ccode, students.studentName as sname, students.studentPhoto as photo, tblpost.question as quest, tblpost.postDate as pdate from courseenrolls join course on course.id=courseenrolls.course join students on students.StudentRegno=courseenrolls.StudentRegno join tblpost on tblpost.userid=courseenrolls.StudentRegno where courseenrolls.studentRegno='" . $_SESSION['login'] . "' and courseenrolls.course='$cid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($sql)) { ?>

                <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <?php if ($row['photo'] == "") { ?>
                                    <img src="studentphoto/noimage.png" width="70" height="70"><?php 
                                                            } else { ?>
                                    <img src="studentphoto/<?php echo htmlentities($row['photo']); ?>" width="70" height="70"><?php } ?>
                                </td>
                                <td>
                                    <b> Student Name: </b>  <?php echo htmlentities($row['sname']); ?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>Questions Posted</td>
                    <td></td>
                </tr>
                <tr class="details">
                    <td><?php echo htmlentities($row['quest']);?></td>
                    <td><?php echo htmlentities($row['pdate']); ?></td>
                </tr>
        </div>
</body>