<?php include "includes/db.php";?>
    <?php include "includes/header.php";?>

    <!-- Navigation -->
   <?php include "includes/navigation.php";?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
<?php
                
                if(isset($_GET['p_id'])){
                    
                    
                    $the_post_id = $_GET['p_id'];
					 $the_post_author = $_GET['author'];
                    
                    
                }
                
                
         $query= "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
        $select_all_post=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_post)){
            
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
                $post_image = $row['post_image'];
            $post_content = $row['post_content'];
           
            
            ?>
            
            
             <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ; ?></a>
                </h2>
                <p class="lead">
                    by All Posts by  <?php echo $post_author; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
               
                <hr>

             
           
             
               
                 
                   
                       
            
            
            
            
     <?php   } ?>
               
               
               
               <?php
                
                if(isset($_POST['create_comment'])){
                    
                       $the_post_id = $_GET['p_id'];
                    
                   $comment_author=$_POST['comment_author'];
                    $comment_email=$_POST['comment_email'];
                    $comment_content=$_POST['comment_content'];
                    
                   if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
                 $query="INSERT INTO comments(comment_post_id,	comment_author,comment_email,comment_content,comment_date,	comment_status) ";
                    
                    $query.="VALUES({$the_post_id},'{$comment_author}','{$comment_email}','{$comment_content}',now(),'unapproved') ";
                    
                    $insert_comment= mysqli_query($connection,$query);
                    if(!$insert_comment){
                        
                        
                        
                        die("query failed".mysqli_error($connection));
                    }
                    
                    
             $query = "UPDATE posts SET post_comment_count= post_comment_count+1 WHERE post_id = '$the_post_id' ";  
                  $comment_count= mysqli_query($connection,$query);  
                    
                    
                    
                    
				   }else
					   
					   
					   
				   {
					   
					   
					   echo "<script>alert('field cannot be empty')</script>";
					   
				   }
                }
                
                
                
                
                
                
                
                
                
                
                ?>
               
               
               
               
                
                
              

                <!-- Posted Comments -->

               
             
                   
                   
                   
                   
                   
                   
                  
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                    
                    
               
                
                
                
                
                
                
                
                
                
                
               
               
               
               
               
                
              
             
            
                
                
                
                

             
                
                 

             

               

            </div>

            <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
            
            
            

        </div>
        <!-- /.row -->

        <hr>
 <?php include "includes/footer.php";?>
        <!-- Footer -->
       