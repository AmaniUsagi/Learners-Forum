<?php
session_start();
include('includes/config.php');
$did = intval($_GET['id']);
if(strlen($_SESSION['login'])==0){
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $question = $_POST['post'];
        $ret = mysqli_query($con, "insert into tblpost(courseid, userid, question) values('$did', '" . $_SESSION['login'] . "', '$question')");
        if ($ret) {
            $_SESSION['msg'] = "Your question has been submited!";
        } else {
            $_SESSION['msg'] = "Error : Question not submited!";
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
                    <div class="panel-heading">
                        <h3>Post Question</h3>
                    </div>
                    <div class="panel-body">
                    <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></font>
                        <form  method="POST">
                            <div class="form-group">
                                <label for="post"></label>
                                <textarea name="post" id="post" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><hr><br>
    <?php include('includes/footer.php'); ?>
</body>

</html>
<?php }?>