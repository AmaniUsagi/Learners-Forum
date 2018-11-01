<?php
session_start();
require_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0){
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
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h4>Posted Questions</h4>
                </div>
                <div class="panel-body">
                <div class="invoice-box">
                        <?php
                        $cid = intval($_GET['id']);
                        $sql = mysqli_query($con, "select students.studentName as sname, students.studentPhoto as photo, tblpost.id as qid, tblpost.question as quest, tblpost.postDate as pdate from students join tblpost on tblpost.userid=students.StudentRegno");
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
                                            <td><b>Post Date:</b><?php echo htmlentities($row['pdate']); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="details">
                                <td><?php echo htmlentities($row['quest']); ?></td>
                                
                                <td>
                                    <a class="btn btn-xs btn-primary" href="details.php?id=<?php echo $row['qid']?>">view</a>
                                </td>
                            </tr><hr><br>
                        </table>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('includes/footer.php'); ?>
</html>