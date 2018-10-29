<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: black; color: white;">
            <span class="glyphicon glyphicon-list"></span> Registerd Units
        </div>
        <div class="panel-body menu" style="border: 0.5px solid black; border-top: none;">
            <ul class="nav">
                <li>
                    <?php $sql = mysqli_query($con, "select id,courseName from course");
                    while ($row = mysqli_fetch_array($sql)) {
                        ?>
                    <a href="category.php?cid=<?php echo $row['id']; ?>" class="dropdown-toggle"><span class="glyphicon glyphicon-circle-arrow-right"></span>
                    <?php echo $row['courseName']; ?></a>
                    <?php 
                    } ?>
                </li>
            </ul>
        </div>
    </div>
</div>