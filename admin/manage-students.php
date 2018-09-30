<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0){   
    header('location:index.php');
}else{
    if(isset($_GET['del'])){
        mysqli_query($con,"delete from students where StudentRegno = '".$_GET['id']."'");
        $_SESSION['delmsg']="Student records deleted!";
    }
    if(isset($_GET['pass'])){
        $password="qwerty";
        $newpass=md5($password);
        mysqli_query($con,"update students set password='$newpass' where StudentRegno = '".$_GET['id']."'");
        $_SESSION['delmsg']="Password Reset. New Password is qwerty";
      } 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Manage Students</title>
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
                <h1 class="page-head-line">Student Records  </h1>
            </div>
        </div>
        <div class="row" >
        <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage student records
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student No</th>
                                    <th>Name</th>
                                    <th>Pincode</th>
                                    <th>Registration date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
<?php
    $sql=mysqli_query($con,"select * from students");
    $cnt=1;
    while($row=mysqli_fetch_array($sql)){
?>

<tr>
    <td><?php echo $cnt;?></td>
    <td><?php echo htmlentities($row['StudentRegno']);?></td>
    <td><?php echo htmlentities($row['studentName']);?></td>
    <td><?php echo htmlentities($row['pincode']);?></td>
    <td><?php echo htmlentities($row['creationdate']);?></td>
    <td>
        <a class="btn btn-xs btn-primary" href="edit-student-profile.php?id=<?php echo $row['StudentRegno']?>">
        <i class="fa fa-edit"></i></a>                                        
        <a class="btn btn-xs btn-danger" href="manage-students.php?id=<?php echo $row['StudentRegno']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
        <i class="fa fa-trash"></i></a>
        <a class="btn btn-xs btn-info" href="manage-students.php?id=<?php echo $row['StudentRegno']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
        <i class="fa fa-refresh" type="submit" name="submit" id="submit"></i></a>
    </td>
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