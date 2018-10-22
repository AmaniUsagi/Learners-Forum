<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="onlinecourse"; // Database name 
$tbl_name="fquestions"; // Table name 

// Connect to server and select database.
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($con,$db_name)or die("cannot select DB");

// get data that sent from form 
$topic="";
$detail="";
$name="";
$email="";

if(isset($_POST['Submit'])){
$topic=mysqli_real_escape_string($con,$_POST['topic']);
$detail=mysqli_real_escape_string($con,$_POST['detail']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
}

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)
VALUES('".$topic."', '".$detail."', '".$name."', '".$email."', '".$datetime."')";

$result=mysqli_query($con,$sql);

if($result){
echo "Successful<BR>";
echo "<a href=main_forum.php>View your topic</a>";
}
else {
echo "ERROR";
}


mysqli_close($con);
?>