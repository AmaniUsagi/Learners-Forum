<?php  ?>
<div id="navbar">
    <?php if (strlen($_SESSION['login'])) { ?>
        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome- <?php echo htmlentities($_SESSION['username']); ?></a>
    <?php } ?>
        <a href="index.php"><span class="glyphicon glyphicon-home"></span> Supermarket </a>
        <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My cart</a>
        <?php if(strlen($_SESSION['login'])==0) {   ?>
            <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
            <?php } else{ ?>
                <a href="logout.php"><i class="icon fa fa-sign-out"></i> Logout</a>
            <?php } ?>	
        
        <div class="track">
            <a class="active" href=""><i class="fa fa-truck"></i> Track order</a>
        </div>
</div>