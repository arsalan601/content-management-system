   
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>id</th>
                                <th>username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                
                                
                                <th>image</th>
                                <th>Role</th>
                                 <th>DELETE</th>
                                  <th>EDIT</th>
                                   <th>Admin</th>
                                     <th>Subscriber</th>
                              
                               
                                
                                </tr>
                                
                                
                            </thead>
                            <tbody>
                              
                               <?php
                                $query = "SELECT * FROM Users ";
                                $select_all_users=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_all_users)){
                                    
                                    
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];
                                       $user_email = $row['user_email'];
                               
                                    
                                    
                                echo "<tr>" ;
                                echo "<td>{$user_id}</td>"    ;
                                echo "<td>{$username}</td>"    ;
                                    echo "<td>{$user_firstname}</td>" ;
                                echo "<td>{$user_lastname}</td>";
                                     echo "<td>{$user_email}</td>";
                                    
//
//                            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
//                           $select_categories_id = mysqli_query($connection,$query);  
//
//                          while($row = mysqli_fetch_assoc($select_categories_id)) {
//                          $cat_id = $row['cat_id'];
//                           $cat_title = $row['cat_title'];
//
//
//                           echo "<td>$cat_title</td>";                         }
//


                               
                               
                                echo "<td><img class='img_responsive' width='200px' src='../images/$user_image'></td>" ;
                                echo "<td>{$user_role}</td>";
                             
                                    
                                  echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";  
                                    echo "<td><a href='users.php?source=edit_all_users&p_id={$user_id}'>EDIT</a></td>";
                                   echo "<td><a href='users.php?admin={$user_id}'>ADMIN</a></td>";  
                                      echo "<td><a href='users.php?subscriber={$user_id}'>SUBSCRIBER</a></td>"; 
                                     
                                    
                                    
                                    
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                               
                               
                
                                echo "</tr>";

                                }
                             
                                ?> 
                         
                            </tbody>
                    
                        </table>
                        
                        
   <?php

if(isset($_GET['admin'])){
    
    $the_user_id = $_GET['admin'];
    
    $query="UPDATE users SET user_role = 'admin' WHERE user_id = '{$the_user_id}' ";
     $admin_all_user = mysqli_query($connection,$query);
    
        header("Location: users.php");
        
    
    
}

if(isset($_GET['subscriber'])){
    
    $the_user_id = $_GET['subscriber'];
    
    $query="UPDATE users SET user_role = 'subscriber' WHERE user_id = '{$the_user_id}' ";
     $admin_all_user = mysqli_query($connection,$query);
    
        header("Location: users.php");
        
    
    
}


if(isset($_GET['delete'])){

 $the_user_id= $_GET['delete'];

$query = "DELETE FROM users WHERE user_id = '{$the_user_id}' ";
    $delete_all_user = mysqli_query($connection,$query);
    
        header("Location: users.php");
        
        
        
        
    }



?>                     
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        