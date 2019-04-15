 <?php

if(isset($_GET['p_id'])){
    
    $the_user_id=$_GET['p_id'];
    
   
}
                $query = "SELECT * FROM users WHERE user_id = $the_user_id  ";
                        $select_all_user_id = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($select_all_user_id)){

                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_image = $row['user_image'];
                        $user_role = $row['user_role'];
                        $user_email = $row['user_email'];


                        }




if(isset($_POST['update_user'])){
    
    $user_firstname = $_POST['user_firstname'];
     $user_lastname = $_POST['user_lastname'];
    
     $username = $_POST['username'];
     $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
       $user_date = date('d-m-y');
    
     $user_image = $_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    
    move_uploaded_file($user_image_temp,"../images/$user_image");
	
	$db_user_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
	   
        if(empty($user_image)){

$query = "SELECT * FROM users WHERE user_id = '{$the_user_id}' ";
    
    $select_image=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_image)){
        
        
        
        $user_image=$row['user_image'];
        
    } }

if((!empty($user_password))){

$query="SELECT user_password FROM users WHERE user_id = '{$the_user_id}' ";
$get_user_query=mysqli_query($connection,$query);
	
	if(!$get_user_query){
		
		
		die("query failed" . mysqli_error($connection));
	}

	$row=mysqli_fetch_array($get_user_query);
	
	$db_user_password =$row['user_password'];
	
	
	
	
	if($db_user_password != $user_password){
		
		
		
		$hashed_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));
		
	}
	


	
	

		
	   
    $query = "UPDATE users SET " ;
    $query.= "user_firstname = '{$user_firstname}' ," ;
    $query.= "user_lastname = '{$user_lastname}' ," ;

    $query.= "username = '{$username}' ," ;
    $query.= "user_email = '{$user_email}' ," ;
    $query.= "user_password = '{$hashed_password}' ," ;
    $query.= "user_date = now() ," ;
    $query.= "user_image = '{$user_image}' " ;
     $query.= "WHERE user_id = '{$the_user_id}' " ;
    
    
    $update_query=mysqli_query($connection,$query);
    
    if(!$update_query){
        
        die("query failed" . mysqli_error($connection));
        
        
        
    } }
    
    	
		
		
		
}
		
		
		
		
		    
 


		
		
		
		
		
		
	
	
	
	
	 
	
	
	
	
	
	
	
	
	
	
 

    













?>    
     
      
      <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="firstname">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" class="form-control">
        
    </div>
     
      <div class="form-group">
        
        <label for="Lastname">Lastname</label>
        <input value="<?php echo $user_lastname; ?>"type="text" name="user_lastname" class="form-control">
        
    </div>
    
   
    
    <div class="form-group">
        
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username; ?>" name="username" class="form-control">
        
    </div>
    
    
    
    <div class="form-group">
        
        <label for="email">Email</label>
        <input value="<?php echo $user_email; ?>" type="text" name="user_email" class="form-control">
        
    </div>
    
    
       <div class="form-group">
        
        <label for="password">Password</label>
        <input type="password" autocomplete="off" value="" name="user_password" class="form-control">
        
    </div>
   
    
    
    
    
    <div class="form-group">
        
        <label for="image"> image</label>
        <img width="150px" src="../images/<?php echo $user_image; ?>" >
        <input type="file" name="user_image" class="form-control">
        
    </div>
    
    
    <input type="submit" name="update_user" value="Update user" class="btn btn-primary">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>