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
    <title>Student | Add Topic</title>
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
                <h1 class="page-head-line">Add Question</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Question
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive table-bordered">
                            <form id="form1" name="form1" method="post" action="add_new_topic.php">
                            <label>Unit : </label>
                            <input type="text" name="topic" id="topic" class="form-control"  autocomplete="off" required/>
                            <label>Question : </label>
                            <input type="text" name="detail" id="detail" class="form-control"  autocomplete="off" required/>
                            <label>Student Name : </label>
                            <input type="text" name="name" id="name" class="form-control"  autocomplete="off" required/>
                            <label>Student Email : </label>
                            <input type="text" name="email" id="email" class="form-control"  autocomplete="off" required/>
                            
                            <input type="submit" name="Submit" value="Submit" />
                            <input type="reset" name="reset" value="Reset" />

</form>



                               
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
