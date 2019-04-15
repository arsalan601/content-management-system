<?php include "includes/header.php" ;?>

    <div id="wrapper">

        <!-- Navigation -->
       
        <?php include "includes/navigation.php" ;?>
        
        
        <?php
        
        if(isset($_SESSION['username'])){
             
            $username =$_SESSION['username'];
            
            $query = "SELECT * FROM users WHERE username = '{$username}'";
            $select_update_profile=mysqli_query($connection,$query);
            if(!$select_update_profile)
            {
                
                die("query Failed" . mysqli_error($connection));
             
            }
            while($row=mysqli_fetch_assoc($select_update_profile)){
                
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_password = $row['user_password'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
                            $user_email = $row['user_email'];

            }

        }
       
        ?>
        
        
        <?php    
        
        
        if(isset($_POST['update_profile'])){
    
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
			
			
		$user_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));	
			
			
			
			
			
			
			
		/*	$query = "SELECT randSalt FROM users";
			$select_salt=mysqli_query($connection,$query);
			if(!$select_salt){
				
				die("query failed" . mysqli_error($connection));
			}
			
			$row=mysqli_fetch_array($select_salt);
			$salt =$row['randSalt'];
			
			$user_password=crypt($user_password,$salt);
			
			*/
			
			
    /*
        if(empty($user_image)){

$query = "SELECT * FROM users ";
    
    $select_imagee=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_imagee)){
        
        
        
        $user_image=$row['user_image'];
        
    }




}
    */
    
    
    $query = "UPDATE users SET " ;
    $query.= "user_firstname = '{$user_firstname}' ," ;
    $query.= "user_lastname = '{$user_lastname}' ," ;
    $query.= "user_role = '{$user_role}' ," ;
    $query.= "username = '{$username}' ," ;
    $query.= "user_email = '{$user_email}' ," ;
    $query.= "user_password = '{$user_password}' ," ;
    $query.= "user_date = now() ," ;
    $query.= "user_image = '{$user_image}' " ;
     $query.= "WHERE username = '{$username}' " ;
    
    
    $update_query=mysqli_query($connection,$query);
    
    if(!$update_query){
        
        die("query failed" . mysqli_error($connection));
        
        
        
    }
    
    


    
}




        
        
        
        
        
        ?>
        
        
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                     
              
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
       <label for="role">Role</label>
       <select name="user_role"  id="">
           <option value="subscriber"><?php echo $user_role; ?></option>
           
           <?php
           if($user_role == 'admin'){
               
               
               echo "<option value='subscriber'>subcriber</option>";
               
               
           }else
               
           {
               echo "<option value='admin'>admin</option>";               
               
               
           }
           
           ?>
       
       
      
        
       </select>
      
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
    
    
    <input type="submit" name="update_profile" value="Update profile" class="btn btn-primary">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>
                        
                       
                    </div>
                    
        
               
               
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

       <?php include "includes/footer.php" ;?>