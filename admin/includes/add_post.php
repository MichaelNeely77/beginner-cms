<?php 


if(isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('M-d-Y');


    move_uploaded_file($post_image_temp, "../images/$post_image" );

    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image, post_content,post_tags,post_status) ";
    $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";

    $create_post_query = mysqli_query($connection, $query);

    confirm_query($create_post_query);

    $the_post_id = mysqli_insert_id($connection);

    echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='../post.php?p_id={$the_post_id}'>Edit More Posts</a></p>";
}

?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
            <?php 
                $query = "SELECT * FROM categories";
                $select_categories_id = mysqli_query($connection, $query);

                confirm_query($select_categories_id);

                while($row = mysqli_fetch_assoc($select_categories_id)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" id="">
    </div>
    <div class="form-group">
            <select name="post_status" id="">
                    <option value="" name="">Post Status</option>
                    <option value="published" name="">Published</option>
                    <option value="draft" name="">Draft</option>
            </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>  
        <input type="text" class="form-control" name="post_tags" id="">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10" ></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Publish Post" class="btn btn-primary" name="create_post">
    </div>
    


</form>