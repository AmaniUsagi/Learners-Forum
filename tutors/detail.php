<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tutors | Forum</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>
<?php include('includes/header.php'); ?>
<div class="container-wrapper">
    <div class="container">
        <div class="col-md-12">
            <h1 class="page-head-line"> Discussion Forum</h1>
        </div>
        <?php include('includes/forum-menu.php') ?>
        <div class="col-md-9">
            <!-- <div class="control-group"> -->
                <label class="control-label" for="ans">Your answer</label>
                <!-- <div class="controls"> -->
                    <textarea  name="ans"  placeholder="Share your answer" rows="6" class="col-md-7">
                    </textarea>  
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
</body>