<?php 
require_once("includes/config.php");
if(!empty($_POST["regno"])) {
	$regno= $_POST["regno"];
	$result =mysqli_query($con,"SELECT TutorRegno FROM tutors WHERE TutorRegno='$regno'");
	$count=mysqli_num_rows($result);
	if($count>0){
		echo "<span style='color:red'> Registratiion number already exists!</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
	}
}
?>