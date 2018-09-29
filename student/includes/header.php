<?php
include("includes/config.php");
error_reporting(0);
?>
<?php if($_SESSION['login']!=""){
    ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="navbar-brand" href="#" style="color:#fff; font-size:24px;4px; line-height:24px; ">
                <span class="glyphicon glyphicon-education"></span> Student Portal
                </a> <br>
                <strong>Welcome: </strong><?php echo htmlentities($_SESSION['sname']);?>
                
             </div>
        </div>
    </div>
<?php } ?>
</header>
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color:#fff; font-size:24px;4px; line-height:24px; ">
            <span class="glyphicon glyphicon-education"></span> Student Portal
            </a>
        </div>
        <div class="left-div">
        <br>
        </div>
    </div>
</div>