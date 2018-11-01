<?php 
session_start();
include('includes/config.php');
if (strlen($_SESSION['tlogin']) == 0) {
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
            <div class="invoice-box">
                <?php
                $qid = intval($_GET['id']);
                $sql = mysqli_query($con, "select tblpost.userid as quid, tblpost.question as quest, tblpost.courseid as cid, tblpost.postDate as pdate, tblanswer.postid as pid, tblanswer.answer as ans, tblanswer.userid as auid, tblanswer.relyDate as rdate, students.studentName as sname, students.studentPhoto as sphoto from tblpost join tblanswer on tblanswer.postid = tblpost.id join students on students.StudentRegno = tblanswer.userid and tblpost.userid where tblpost.id = '$qid' ");
                $cnt = 1;
                while ($row = mysqli_fetch_array($sql)) { ?>

                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="1">
                            <table>
                                <tr>
                                    <td class="title">
                                    <?php if ($row['photo'] == "") { ?>
                                                <img src="../student/studentphoto/noimage.png" width="70" height="70"> { <?php 
                                                                                                        } else { ?>
                                                <img src="../student/studentphoto/<?php echo htmlentities($row['photo']); ?>" width="70" height="70"><?php 
                                                                                                                                        } ?>
                                    </td>
                                    <td><b> Student Name: </b>  <?php echo htmlentities($row['sname']); ?><br></td>
                                </tr>
                                <tr>
                                    <td><?php echo htmlentities($row['quest']); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="heading">
                        <td>Answers</td>
                    </tr>
                    <tr class="datails">
                        <td><?php echo htmlentities($row['ans'])?></td>
                    </tr>
                                                                                                                </table> <?php } ?>
            </div>
            <div>
                <form method="POST">
                    <div class="form-group">
                        <label for="">Your answer</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success center-block" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php 
} ?>
