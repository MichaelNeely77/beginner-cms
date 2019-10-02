<div class="col-md-4">




<!-- Login -->
<div class="well">

    <?php if(isset($_SESSION['user_role'])): ?>

        <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>

        <a class="btn btn-primary" href="includes/logout.php">Logout</a>

    <?php else :?>
    <h4>Login</h4>

<form action="includes/login.php" method="post">
<div class="form-group">
    <input name="username" type="text" class="form-control" placeholder="Enter Username">
    
</div>
<div class="input-group">
    
    <input name="password" type="password" class="form-control" placeholder="Enter Password">
    <span class="input-group-btn">
        <button class="btn btn-primary" name="login" type="submit">Submit</button>
    </span>
</div>
</form>
<!-- /.input-group -->

<?php endif; ?>


</div>



<!-- Blog Categories Well -->
<div class="well">

<?php 
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection, $query);
    
        
    
    ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php
            while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
        }
        ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->


    </div>
    <!-- /.row -->
</div>



<!-- Side Widget Well -->
<?php include 'widget.php'; ?> 

</div>