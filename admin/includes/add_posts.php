<?php

if(isset($_POST['create_post'])){
    
    $post_title = $_POST['post_title'];
     $post_category_id = $_POST['post_category'];
     $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
     $post_tags = $_POST['post_tags'];
     $post_content = $_POST['post_content'];
       $post_date = date('d-m-y');
    
     $post_image = $_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    
$query = "INSERT INTO posts(post_category_id, post_title, post_author,post_status ,post_date, post_tags, post_image, post_content) ";
    
$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_status}',now(),'{$post_tags}','{$post_image}','{$post_content}' ) " ; 
    
    $insert_post=mysqli_query($connection,$query);
    
    if(!$insert_post){
        
        
        
        die('query failed'.mysqli_error($connection));
    }
	
	$the_post_id=mysqli_insert_id($connection);
	
	echo "<h3 class='bg-sucess'>Posts Created<a href='../post.php?p_id={$the_post_id}'>view post</a></h3>";
    
}



?>
 
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
        
    </div>
    
   
        <div class="form-group">
       <label for="category">Category</label>
       <select name="post_category" id="">
           
<?php

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        
    


        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
            
            echo "<option value='$cat_id'>{$cat_title}</option>";
         
            
        }

?>
           
        
       </select>
      
      </div>
    
    <div class="form-group">
        
        <label for="post_author">Post author</label>
        <input type="text" name="post_author" class="form-control">
        
    </div>
    
     <div class="form-group">
        
        <label for="post_status">Post status</label>
		 <select name="post_status">
		 	<option value="draft">Select option</option>
		 	<option value="published">Published</option>
		 	<option value="draft">Draft</option>
		 	
		 	
		 	
		 	
		 </select>
        
    </div>
    
    
    
    <div class="form-group">
        
        <label for="post_tags">Post tags</label>
        <input type="text" name="post_tags" class="form-control">
        
    </div>
    
    
      
    <div class="form-group">
        
        <label for="post_content">Post content</label>
        <textarea  col='30' rows='10' name="post_content" id="body" class="form-control"></textarea>
        
    </div>
    
    
    
    
    <div class="form-group">
        
        <label for="post_image">Post image</label>
        <input type="file" name="post_image" class="form-control">
        
    </div>
    
    
    <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</form>