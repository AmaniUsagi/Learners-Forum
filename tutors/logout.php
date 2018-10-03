<?php
session_start();
include("includes/config.php");
$_SESSION['tlogin']=="";
session_unset();
//session_destroy();
$_SESSION['errmsg']="Successfully logged out!";
?>
<script language="javascript">
document.location="index.php";
</script>
