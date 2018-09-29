<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0){   
    header('location:index.php');
}else{
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course Enrollment Print</title>
    <link href="assets/css/print.css" rel="stylesheet" />
</head>
<body>
<div class="invoice-box">
    <?php
    $cid=intval($_GET['id']);
    $sql=mysqli_query($con,"select course.courseName as courname,course.courseCode as ccode,course.courseUnit as cunit,session.session as session,department.department as dept,level.level as level,courseenrolls.enrollDate as edate,semester.semester as sem ,students.studentName as studentname,students.studentPhoto as photo,students.cgpa as scgpa,students.creationdate as studentregdate from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department join level on level.id=courseenrolls.level join students on students.StudentRegno=courseenrolls.StudentRegno join semester on semester.id=courseenrolls.semester where courseenrolls.studentRegno='".$_SESSION['login']."' and courseenrolls.course='$cid'");
    $cnt=1;
    while($row=mysqli_fetch_array($sql)){
        ?>
<table cellpadding="0" cellspacing="0">
    <tr class="top">
        <td colspan="2">
            <table>
                <tr>
                    <td class="title">
                        <?php if($row['photo']==""){ ?>
                        <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
                        <img src="studentphoto/<?php echo htmlentities($row['photo']);?>" width="200" height="200">
                        <?php } ?>
                    </td>
                    <td>
                        <b> Reg No: </b><?php echo htmlentities($_SESSION['login']);?><br>
                        <b> Student Name: </b>  <?php echo htmlentities($row['studentname']);?><br>
                        <b> Student Reg Date:</b> <?php echo htmlentities($row['studentregdate']);?><br>
                        <b> Student Course Enroll Date:</b> <?php echo htmlentities($row['edate']);?><br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="heading">
        <td>Course Details</td>
        <td></td>
    </tr>
    <tr class="details">
        <td>Course Code</td>
        <td><?php echo htmlentities($row['ccode']);?></td>
    </tr>
    <tr class="details">
        <td>Course Name</td>
        <td><?php echo htmlentities($row['courname']);?></td>
    </tr>
    <tr class="details">
        <td>Course unit</td>
        <td><?php echo htmlentities($row['cunit']);?></td>
    </tr>
    <tr class="heading">
        <td>Other Details</td>
        <td></td>
    </tr>
    <tr class="item">
        <td>Session</td>
        <td><?php echo htmlentities($row['session']);?></td>
    </tr>
    <tr class="item">
        <td>Department</td>
        <td><?php echo htmlentities($row['dept']);?></td>
    </tr>
    <tr class="item">
        <td>Level</td>
        <td><?php echo htmlentities($row['level']);?></td>
    </tr>
    <tr class="item">
        <td> CGPA</td>
        <td><?php echo htmlentities($row['scgpa']);?></td>
    </tr>
    <tr class="item last">
        <td>Semester</td>
        <td><?php echo htmlentities($row['sem']);?></td>
    </tr>
</table>
        <?php } ?>
    </div>
</body>
</html>
<?php } ?>