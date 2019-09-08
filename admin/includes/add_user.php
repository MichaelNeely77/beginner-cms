<?php 

if(isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    // $post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('M-d-Y');


    // move_uploaded_file($post_image_temp, "../images/$post_image" );

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' ) ";

    $create_user_query = mysqli_query($connection, $query);

    confirm_query($create_user_query);

    echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";
}

?>



<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control"  name="user_firstname" id="">
    </div>
    <div class="form-group">
        <label for="user_lastname" name="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" id="">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
        <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        
        </select>
    </div>
    <div class="form-group">
        <label for="user_email">Username</label>  
        <input type="text" class="form-control" name="username" id="">
    </div>

    <!-- <div class="form-group">
        <label for="username">User Image</label>
        <input type="file" name="post_image">
    </div> -->
    <div class="form-group">
        <label for="user_email">User Email</label>  
        <input type="email" class="form-control" name="user_email" id="">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>  
        <input type="password" class="form-control" name="user_password" id="">
    </div>
    <div class="form-group">
        <input type="submit" value="Add User" class="btn btn-primary" name="create_user">
    </div>
    


</form>