<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$did = intval($_GET['id']);
if (strlen($_SESSION['tlogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $answer = $_POST['ans'];
        $ret = mysqli_query($con, "insert into tblanswer(postid, userid, answer) values('$did', '" . $_SESSION['id'] . "', '$answer')");
        if ($ret) {
            $_SESSION['msg'] = "Your answer has been submited!";
        } else {
            $_SESSION['msg'] = "Error : Answer not submited!";
        }
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
    <link href="assets/css/forum.css" rel="stylesheet" />
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
                $sql = mysqli_query($con, "select students.studentName as sname, students.studentPhoto as photo, tblpost.question as quest, tblpost.postDate as pdate from students join tblpost on tblpost.userid=students.StudentRegno where tblpost.id='$did' ");
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
                                    <td><b>Post Date: </b><?php echo htmlentities($row['pdate']); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo htmlentities($row['quest']); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table> <?php 
                    } ?>
                <?php
                $ret = mysqli_query($con, "select * from tblanswer where postid='$did'");
                $num = mysqli_num_rows($ret);
                if ($num > 0) {
                    while ($row = mysqli_fetch_array($ret)) { ?>
                <table cellpadding="0" cellspacing="0">
                <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></font>
                    <tr class="heading">
                        <td>Answer</td>
                        <td><b>Post Date: </b><?php echo htmlentities($row['replyDate']); ?></td>
                    </tr>
                    <tr class="details">
                        <td><?php echo htmlentities($row['answer']); ?></td>
                    </tr><hr><br>
                </table>
                <?php 
            }
        } else { ?> 
                    <table cellpadding="0" cellspacing="0">
                        <tr class="details">
                            <td><h2>No Answers Posted!</h2></td>                                         
                        </tr>                                                                                   
                    </table>
                <?php 
            } ?>
            </div>
            <?php 
        } ?><br><hr><br>
            <table cellpadding="0" cellspacing="0">
                <tr class="details">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="ans">Your answer</label>
                            <textarea name="ans" id="ans" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-success center-block" name="submit" id="submit" value="Submit">
                    </form><br><hr><br>
                </tr>
            </table>
        <div>   
    </div>
</div></div></div><?php include('includes/footer.php'); ?>
</body>
</html>
