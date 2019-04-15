
                          <form action="" method="post">
                          
                          <div class="form-group">
                              <label for="cat-title">Update Categories</label>
                              <?php   //updating categories
                              
                              if(isset($_GET['edit'])){
                                  
                                   $the_cat_id =$_GET['edit'];    
                                  
                                  $query = "SELECT * FROM categories WHERE cat_id = '{$the_cat_id}' " ;
                                  
                                  $select_all_id = mysqli_query($connection,$query);
                                  
                                  while($row=mysqli_fetch_assoc($select_all_id)){
                                      
                                      $cat_id=$row['cat_id'];
                                      $cat_title =$row['cat_title'];
                                      
                                     ?> 
                                      
                                        <input value="<?php if(isset($cat_title)){echo $cat_title ; } ?>" type="text" class="form-control" name="cat_title">
                                      
                                      
                                <?php  }} ?>
                                  
                              
                              <?php
                              
                    if(isset($_POST['update_category'])){
                                  
                    $cat_title  = $_POST['cat_title'];
                                  
                      $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = '{$the_cat_id}' " ;
                                  
                             $update_all_cat = mysqli_query($connection,$query);
                        
                                  
                                  
                              }
                              
                              
                              
                              
                              ?>
                              
                              
                              
                              
                            
                             
                          </div>
                          <div class="form-group">
                           
                              <input type="submit" name="update_category" value="Update category"  class="btn btn-primary">
                              
                              
                          </div>
                          
                          
                      </form>
                      
                      
                       