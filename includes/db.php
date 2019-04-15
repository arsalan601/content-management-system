<?php

$connection = mysqli_connect("localhost","root","","cms");
if(!$connection){

die("query failed".mysqli_error($connection));
}


?>