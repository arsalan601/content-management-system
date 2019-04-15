 <?php

if(isset($_GET['p_id'])){
    
    $the_post_id=$_GET['p_id'];
    
    }
    
                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
                    $select_all_post_id = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_all_post_id)){


                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_tags = $row['post_tags'];
                        $post_status = $row['post_status'];
                     $post_content = $row['post_content'];
                    $post_image = $row['post_image'];
                    $post_status = $row['post_status'];
                    $post_comment_count = $row['post_comment_count'];

 
}








if(isset($_POST['update_post'])){
    
    
         $post_title =$_POST['post_title'];
         $post_category_id =$_POST['post_category'];
    $post_author =$_POST['post_author'];
     $post_status =$_POST['post_status'];
    $post_tags =$_POST['post_tags'];
    $post_content =$_POST['post_content'];
 
      $post_date = date('d-m-y');
     
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    
    move_uploaded_file( $post_image_tmp, "../images/$post_image");
    
    if(empty($post_image)){
        
        $query = "SELECT * FROM posts WHERE post_id = '{$the_post_id}' ";
        $select_image = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_image)){
            
            $post_image = $row['post_image'];
            
            
            
            
        }
        
        
    }
        
        
        
    
    
    
    $query="UPDATE posts SET ";
    $query .="post_title = '{$post_title}', ";
    $query .="post_category_id = '{$post_category_id}', ";
    $query .="post_author = '{$post_author}', ";
    $query .="post_status = '{$post_status}', ";
    $query .="post_tags = '{$post_tags}', ";
    $query .="post_content = '{$post_content}', ";
    $query .="post_date = now() , ";
    $query .="post_image = '{$post_image}'  ";
    $query .="WHERE post_id ={$the_post_id} " ;
    
    $update_post=mysqli_query($connection,$query);
    if(!$update_post){
        
        
        die("query failed" . mysqli_error($connection));
        
        
        
    }




    echo "<h4 class='bg-success'>post updated <a href='../post.php?p_id={$the_post_id}'>view post</a>OR<a href='posts.php'>edit other post</a></h4>";
    
    
    
    
}

?>    
     
      
        <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="title">Post Title</label>
        <input type="text"  value="<?php echo $post_title; ?>" name="post_title" class="form-control">
        
    </div>
    
    <div class="form-group">
      <label for="categories">categories</label>
      
       <select name="post_category">
           
           <?php
           
           $query= "SELECT * FROM categories ";
           
           
           $select_categories = mysqli_query($connection,$query);
           while($row=mysqli_fetch_assoc($select_categories)){
               
            $cat_id   =$row['cat_id'];
            $cat_title  = $row['cat_title'];
               
               echo "<option value='{$cat_id}'>{$cat_title}</option>" ;
               
               
           }
           
           
           
           ?>
           
       </select> 
       
    </div>
    
    <div class="form-group">
        
        <label for="post_author">Post author</label>
        <input type="text" value="<?php echo $post_author; ?>" name="post_author" class="form-control">
        
    </div>
    
    
    
    <div class="form-group">
        
        <label for="post_tags">Post tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" name="post_tags" class="form-control">
        
    </div>
    
     <div class="form-group">
        
        <label for="post_status">Post status</label>
        
         <select name="post_status" id="">
             
             <option value="draft"><?php echo $post_status; ?></option>
             
             <?php
             if($post_status == draft){
             
            echo "<option value='published'>published</option>";
             
             
             }else
             
            echo "<option value='draft'>draft</option>";
    
        
        ?>
         </select>
        
        
    </div>
    
    
      
    <div class="form-group">
        
        <label for="post_content">Post content</label>
        <textarea  col='30' rows='10' name="post_content"  class="form-control">
            
            <?php echo $post_content; ?>
        </textarea>
        
    </div>
    
    
    
    
    <div class="form-group">
       
        
     <img src="../images/<?php echo $post_image?>" width="100px">
     <input type="file" name="post_image" >
    </div>
    
    
    <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    

    
</form>