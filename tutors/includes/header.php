<?php
include("includes/config.php");
error_reporting(0);
?>
<?php if($_SESSION['tlogin']!=""){
    ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="navbar-brand" href="#" style="color:#fff; font-size:24px;4px; line-height:24px; ">
                <span class="glyphicon glyphicon-pencil"></span> Tutors' Portal
                </a> <br>
                <strong>Welcome: </strong><?php echo htmlentities($_SESSION['tname']);?>
             </div>
        </div>
    </div>
<?php } ?>
</header>