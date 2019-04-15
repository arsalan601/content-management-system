<?php

if(isset($_POST['checkAllArray'])){
	
	foreach($_POST['checkAllArray'] as $checkvalue_id){
		
		$bulkOption = $_POST['bulkOption'];
		
		
		
		switch($bulkOption){
				
			case 'published':
		
		
		$query = "UPDATE posts SET post_status ='{$bulkOption}' WHERE post_id = '{$checkvalue_id}' " ;
		$publish_post=mysqli_query($connection,$query);
		
		break;
				
			case 'draft':
				
				
		$query = "UPDATE posts SET post_status ='{$bulkOption}' WHERE post_id = '{$checkvalue_id}' " ;
		$draft_post=mysqli_query($connection,$query);
		break;
				
			case 'delete':	
				
				
			$query = "DELETE FROM posts WHERE post_id = '{$checkvalue_id}' " ;
		$delete_post=mysqli_query($connection,$query);
		break;
				
				
			case 'clone':
				
				$query = "SELECT * FROM posts WHERE post_id = '{$checkvalue_id}' ";
                                $select_all_post=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_all_post)){
                                    
                                    
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
									$post_content = $row['post_content'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_date = $row['post_date'];
                                    $post_tags = $row['post_tags'];
                                    $post_image = $row['post_image'];
                                    $post_status = $row['post_status'];
                                    $post_comment_count = $row['post_comment_count'];
                                    
								}
								$query = "INSERT INTO posts(post_category_id, post_title, post_author,post_status ,post_date, post_tags, post_image, post_content) ";
    
$query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_status}',now(),'{$post_tags}','{$post_image}','{$post_content}') " ; 
    
    $insert_post=mysqli_query($connection,$query);
    
    if(!$insert_post){
        
        
        
        die('query failed'.mysqli_error($connection));
    }	
									
									
									
				
				
				break;
				
		}
		
	}
	
	
	
	
	
	
	
}


?>
                                      
           <form method="post" action="">
      <table class="table table-bordered table-hover">
                           
    <div class="col-xs-4" id="bulkOptionContainer">
    
    
    <select class="form-control" name="bulkOption">
    	
    	<option value="">Select option</option>
    	<option value="published">Publish</option>
    	<option value="draft">draft</option>
    	<option value="delete">delete</option>
    	<option value="clone">clone</option>
    	
    	
    </select>
    	
    
    </div>   
       
                           
       <div class="col-xs-4">
             
           <input type="submit" name="submit" value="apply" class="btn btn-primary">
            <a href="posts.php?source=add_posts" class="btn btn-success">Add post</a>                                                                                                                                                    
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      
          </div>                                        
                                                                                       
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                            <thead>
                                <tr>
                                 <th><input type="checkbox" id="selectAllBoxes"></th> 
                                <th>id</th>
                                <th>author</th>
                                <th>title</th>
                                <th>categories</th>
                                <th>image</th>
                                <th>status</th>
                                <th>tags</th>
                                <th>comment</th>
                                <th>date</th>
                                 <th>view post</th>
                                  <th>Edit</th>
                                   <th>Delete</th>
                                    <th>post view count</th>
                                </tr>
                                
                                
                            </thead>
                            <tbody>
                              
                               <?php
                                $query = "SELECT * FROM posts ORDER BY post_id DESC ";
                                $select_all_post=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_all_post)){
                                    
                                    
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_date = $row['post_date'];
                                    $post_tags = $row['post_tags'];
                                    $post_image = $row['post_image'];
                                    $post_status = $row['post_status'];
                                    $post_comment_count = $row['post_comment_count'];
									$post_view_count = $row['post_view_count'];
                                    
                                    
                                echo "<tr>" ;
									
									?>
									
									<td><input type='checkbox' class='checkboxes' name='checkAllArray[]' value="<?php echo $post_id; ?>"> </td>
									
									
									<?php
                                echo "<td>{$post_id}</td>"    ;
                                echo "<td>{$post_author}</td>"    ;
                                echo "<td>{$post_title}</td>";
                                    

                            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                           $select_categories_id = mysqli_query($connection,$query);  

                          while($row = mysqli_fetch_assoc($select_categories_id)) {
                          $cat_id = $row['cat_id'];
                           $cat_title = $row['cat_title'];


                           echo "<td>$cat_title</td>";                         }



                               
                                echo "<td><img class='img-responsive' width='100px' src='../images/$post_image'></td>";
                                echo "<td>{$post_status}</td>"    ;
                                echo "<td>{$post_tags}</td>"    ;
									
									$query = "SELECT * FROM comments WHERE comment_post_id ='{$post_id}'";
									$comment_count=mysqli_query($connection,$query);
									$row=mysqli_fetch_assoc($comment_count);
									$comment_id=$row['comment_id'];
									
									$count_comm=mysqli_num_rows($comment_count);
									
									
									
									
                                echo "<td><a href='post_comments.php?id=$comment_id>{$count_comm}</a></td>"    ;
                                echo "<td>{$post_date}</td>";
								echo "<td><a href='../post.php?p_id={$post_id}'>view post</a></td>";	
                                echo "<td><a onClick=\"javascript: return confirm('Are You want this delete')\" href='posts.php?delete={$post_id}'>DELETE</a></td>";
                                echo "<td><a href='posts.php?source=edit_all_posts&p_id={$post_id}'>EDIT</a></td>" ;
								echo "<td><a href='posts.php?reset={$post_id}'>{$post_view_count}</a></td>";
                                echo "</tr>";

                                }
                             
                                ?> 
                         
                            </tbody>
                    
                        </table>
                        
                        </form>
   <?php


if(isset($_GET['delete'])){

 $the_post_id= $_GET['delete'];

$query = "DELETE FROM posts WHERE post_id = '{$the_post_id}' ";
    $delete_all_post = mysqli_query($connection,$query);
    if(!$delete_all_post){
        
        die("query failed" . mysqli_error($connection));
        header("Location: posts.php");
        
        
        
        
    }


}

if(isset($_GET['reset'])){

 $the_post_id= $_GET['reset'];

$query = "UPDATE posts SET post_view_count = 0  WHERE post_id = '{$the_post_id}' ";
    $reset_all_post = mysqli_query($connection,$query);
    if(!$reset_all_post){
        
        die("query failed" . mysqli_error($connection));
        header("Location: posts.php");
        
        
        
        
    }


}


?>                     
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        