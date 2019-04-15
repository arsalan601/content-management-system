<?php

if(isset($_POST['create_user'])){
    
    $user_firstname = $_POST['user_firstname'];
     $user_lastname = $_POST['user_lastname'];
     $user_role = $_POST['user_role'];
     $username = $_POST['username'];
     $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
       $user_date = date('d-m-y');
    
     $user_image = $_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    
    move_uploaded_file($user_image_temp,"../images/$user_image");
	
	
	
	$user_password =password_hash( $user_password,PASSWORD_BCRYPT,array('cost' => 10));
    
    
$query = "INSERT INTO users(user_firstname, user_lastname,user_role, username, user_email, user_password,user_date,user_image) ";
    
$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}', now(),'{$user_image}' ) " ; 
    
    $insert_user=mysqli_query($connection,$query);
    
    if(!$insert_user){
        
        
        
        die('query failed'.mysqli_error($connection));
    }

    
    echo "user created sucessfully" . " " . "<a href='users.php'>View user</a>";
}



?>
 
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
        
    </div>
     
      <div class="form-group">
        
        <label for="Lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
        
    </div>
    
   
        <div class="form-group">
       <label for="role">Role</label>
       <select name="user_role" id="">
       
        <option value='subscriber'>Select Option</option>    
      <option value='admin'>Admin</option>
      <option value='subscriber'>Subcriber</option>
           
        
       </select>
      
      </div>
    
    <div class="form-group">
        
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
        
    </div>
    
    
    
    <div class="form-group">
        
        <label for="email">Email</label>
        <input type="text" name="user_email" class="form-control">
        
    </div>
    
    
       <div class="form-group">
        
        <label for="password">Password</label>
        <input type="password" name="user_password" class="form-control">
        
    </div>
   
    
    
    
    
    <div class="form-group">
        
        <label for="image"> image</label>
        <input type="file" name="user_image" class="form-control">
        
    </div>
    
    
    <input type="submit" name="create_user" value="Add user" class="btn btn-primary">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>