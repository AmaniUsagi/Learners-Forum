<?php
session_start();
include('includes/config.php');
error_reporting(0);
$cid = intval($_GET['cid']);
if(strlen($_SESSION['login'])==0){
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
                <?php 
                        $sql = mysqli_query($con, "select courseName  from course where id='$cid'");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                <div class="panel-heading">
                    <h4><?php echo htmlentities($row['courseName']); ?></h4>
                </div>
                <div class="panel-body">
                    <div class="invoice-box">
                    <?php
                        $ret = mysqli_query($con, "select * from tblpost where courseid='$cid'");
                        $num = mysqli_num_rows($ret);
                        if ($num > 0) {
                        while ($row = mysqli_fetch_array($ret)) { ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr class="heading">
                                <td>Question</td>
                                <td><b>Post Date: </b><?php echo htmlentities($row['postDate']); ?></td>
                            </tr>
                            <tr class="details">
                                <td><?php echo htmlentities($row['question']); ?></td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="details.php?id=<?php echo $row['id']?>">view</a>
                                </td>
                            </tr><hr><br>
                        </table>
                        <a href="post.php?id=<?php echo $row['courseid']?>" class="btn btn-primary pull-right">Post a question</a>
                         <?php } } else { ?> 
                        <table cellpadding="0" cellspacing="0">
                            <tr class="details">
                                <td>
                                    <h2>No Questions Posted!</h2>
                                </td>                                         
                            </tr>                                                                                   
                        </table>
                        <?php } ?>
                    </div><br>
                    
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div><br><hr><br>
<?php include('includes/footer.php'); ?>
</body>
<html>

<?php } ?>
                         

