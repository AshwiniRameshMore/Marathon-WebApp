<?php
/* More, Ashwini  Account: jadrn031
                  CS545, Fall 2016
                  Project #3 */
				  
include('helpers.php');
include('p2.php');

check_post_only();
$params = process_parameters();
validate_data($params);
store_data_in_db($params);

include('confirmation.php');
?>    
