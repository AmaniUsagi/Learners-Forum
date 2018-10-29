<?php
session_start();
include("includes/config.php");
$_SESSION['tlogin']=="";
session_unset($_SESSION['tlogin']);
//session_destroy();
$_SESSION['errmsg']="Successfully logged out!";
?>
<script language="javascript">
document.location="index.php";
</script>
