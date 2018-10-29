<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){   
    header('location:index.php');
}else{
    $id=intval($_GET['id']);
    date_default_timezone_set('Africa/Nairobi');
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_POST['submit'])){
        $coursecode=$_POST['coursecode'];
        $coursename=$_POST['coursename'];
        $seatlimit=$_POST['seatlimit'];
        $dept=$_POST['dept'];
        $ret=mysqli_query($con,"update course set courseCode='$coursecode',courseName='$coursename',noofSeats='$seatlimit',department='$dept',updationDate='$currentTime' where id='$id'");
        if($ret){
            $_SESSION['msg']="Course updated successfully!";
        }else{
            $_SESSION['msg']="Error : Course not updated!";
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
    <title>Admin | Course</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
<?php if($_SESSION['alogin']!=""){
    include('includes/menubar.php');
}
 ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Courses </h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Course 
                        </div>
                        <font color="red" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
                        <div class="panel-body">
                            <form name="course" method="post">
                                <?php
                                    $sql=mysqli_query($con,"select * from course where id='$id'");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                ?>
                                <div class="form-group">
                                    <label for="coursecode">Course code  </label>
                                    <input type="text" class="form-control" id="coursecode" name="coursecode" autocomplete="off" value="<?php echo htmlentities($row['courseCode']);?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="coursename">Course name  </label>
                                    <input type="text" class="form-control" id="coursename" name="coursename" autocomplete="off" value="<?php echo htmlentities($row['courseName']);?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="seatlimit">Seat limit  </label>
                                    <input type="number" class="form-control" id="seatlimit" name="seatlimit" autocomplete="off" value="<?php echo htmlentities($row['noofSeats']);?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="dept">Department</label>
                                    <div class="controls">
                                        <select name="dept" id="dept" class="form-control"  required />
                                            <option value="">Select Department</option> 
                                            <?php $query=mysqli_query($con,"select * from department");
                                            while($row=mysqli_fetch_array($query))
                                            {?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['department'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>  
                                <?php } ?>
                                <button type="submit" name="submit" class="btn btn-primary center-block"><i class=" fa fa-refresh "></i> Update</button>
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
