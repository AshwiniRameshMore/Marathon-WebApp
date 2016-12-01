<?php
/* More, Ashwini  Account: jadrn031
                  CS545, Fall 2016
                  Project #3 */
				  
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn031';
$password = 'samovar';
$database = 'jadrn031';

if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);

$email =$_GET['email'];
$sql = "select * from person where email='$email';";
mysqli_query($db, $sql);
$how_many = mysqli_affected_rows($db);
mysqli_close($db);

if($how_many > 0)
    echo "dup";
else if($how_many == 0)
    echo "OK";
else
    echo "ERROR, failure ".$how_many;
?>