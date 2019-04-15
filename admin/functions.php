<?php

function users_0nline(){

	
			
		global $connection;



		
$session = session_id();
$time = time();
$time_in_sec = 60;
$time_out = $time-$time_in_sec;
		
	$query="SELECT * FROM users_online WHERE session = '{$session}'";
	$users_counting=mysqli_query($connection,$query);
	$user_count=mysqli_num_rows($users_counting);
		
		
		if($user_count == NULL){
			
		mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES('{$session}','{$time}')");
			
			
			
			
		}else{
			
			
			mysqli_query($connection,"UPDATE users_online SET time = $time WHERE session = '{$session}' ");
				
			
			
		}
		
		$query="SELECT * FROM users_online WHERE time > $time_out  ";
		$send_query=mysqli_query($connection,$query);
		return $count_user=mysqli_num_rows($send_query);
		
		


}

	









function insert_categories(){
    
    
    global $connection;
    

if(isset($_POST['submit'])) {

    $cat_title  = $_POST['cat_title'];

   if($cat_title == "" || empty($cat_title)){


       echo "This field should not be empty ";


   }
    else
   {

       $query = "INSERT INTO categories(cat_title) ";
       $query .= "VALUE('{$cat_title}') ";

       $create_category = mysqli_query($connection, $query);
       if(!$create_category){



           die('query failed' .mysqli_error($connection));
       }


   }

}
}

function Findallcategories(){
    
    
    global $connection;
    
$query = "SELECT * FROM categories ";
$select_all_cat=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_all_cat)){

$cat_id=$row['cat_id'];
$cat_title=$row['cat_title'];

echo "<tr>";
echo "<td>$cat_id</td>" ;
echo "<td>$cat_title</td>" ;
echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>" ;
echo "<td><a href='categories.php?edit={$cat_id}'>Update</a>" ;
echo "<tr>";
}

    
}

function deletecategories(){
    
    global $connection;
    
    if(isset($_GET['delete'])){

  $the_cat_id = $_GET['delete'];

  $query = "DELETE FROM categories WHERE cat_id = '{$the_cat_id}' ";

  $delete_query = mysqli_query($connection,$query);

  header("Location: categories.php");


                      }
                      
    
    
    
    
    
}
































?>