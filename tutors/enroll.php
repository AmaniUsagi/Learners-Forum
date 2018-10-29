<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['tlogin']) == 0 or strlen($_SESSION['pcode']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $tutorregno = $_POST['tutorregno'];
        $pincode = $_POST['Pincode'];
        $session = $_POST['session'];
        $dept = $_POST['department'];
        $course = $_POST['course'];
        $sem = $_POST['sem'];
        $ret = mysqli_query($con, "insert into tutorenrolls(tutorRegno,pincode,session,department,course,semester) values('$tutorregno','$pincode','$session','$dept','$course','$sem')");
        if ($ret) {
            $_SESSION['msg'] = "Enrolled Successfully!";
        } else {
            $_SESSION['msg'] = "Error : Enrollment Failed!";
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
    <title>Tutor | Enrollment</title>
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
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Course Enrollment </h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Course enrollment
                        </div>
                        <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></font>
                            <?php $sql = mysqli_query($con, "select * from tutors where TutorRegno='" . $_SESSION['tlogin'] . "'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                        <div class="panel-body">
                            <form name="dept" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tutorname">Tutors' Name  </label>
                                    <input type="text" class="form-control" id="tutorname" name="tutorname" readonly value="<?php echo htmlentities($row['tutorName']); ?>"  />
                                </div>
                                <div class="form-group">
                                    <label for="tutorregno">Tutors' Number   </label>
                                    <input type="text" class="form-control" id="tutorregno" name="tutorregno" readonly value="<?php echo htmlentities($row['TutorRegno']); ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="Pincode">Pincode  </label>
                                    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']); ?>" />
                                </div>   
                                <div class="form-group">
                                    <label for="Session">Session  </label>
                                    <select class="form-control" name="session" required="required">
                                    <option value="">Select Session</option>   
                                    <?php 
                                    $sql = mysqli_query($con, "select * from session");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['session']); ?></option>
                                        <?php 
                                    } ?>
                                    </select> 
                                </div> 
                                <div class="form-group">
                                    <label for="Department">Department  </label>
                                    <select class="form-control" name="department" required="required">
                                    <option value="">Select Depertment</option>   
                                <?php 
                                $sql = mysqli_query($con, "select * from department");
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['department']); ?></option>
                                        <?php 
                                    } ?>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="Semester">Semester  </label>
                                    <select class="form-control" name="sem" required="required">
                                    <option value="">Select Semester</option>   
                                    <?php 
                                    $sql = mysqli_query($con, "select * from session");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <option value="<?php echo htmlentities($row['Semester']); ?>"><?php echo htmlentities($row['Semester']); ?></option>
                                        <?php 
                                    } ?>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="Course">Course  </label>
                                    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
                                    <option value="">Select Course</option>   
                                    <?php 
                                    $sql = mysqli_query($con, "select * from course");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['courseName']); ?></option>
                                        <?php 
                                    } ?>
                                    </select> 
                                    <span id="course-availability-status1" style="font-size:12px;">
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary center-block"><span class="glyphicon glyphicon-book"></span> Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php include('includes/footer.php'); ?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
<script>
function courseAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'cid='+$("#course").val(),
    type: "POST",
    success:function(data){
        $("#course-availability-status1").html(data);
        $("#loaderIcon").hide();
        },
    error:function (){}
    });
}
</script>
</body>
</html>
<?php 
} ?>
<?php 
} ?>