<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--  More, Ashwini  Account: jadrn031
                     CS545, Fall 2016
                     Project #3
-->
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Report</title>
<link rel="stylesheet" type="text/css" href="style_report.css" />
</head>

<body>
<h1>SDSU Marathon Roster</h1>
<div class="header"></div>
<?php
  $server = 'opatija.sdsu.edu:3306';
  $user = 'jadrn031';
  $password ='samovar';
  $database = 'jadrn031';
  if(!($db = mysqli_connect($server,$user,$password,$database)))
	  echo "ERROR in connection ".mysqli_error($db);
  else{
	  $sql = "select img,lname,fname,TIMESTAMPDIFF(YEAR,DOB,CURDATE()) as age,cat,exp from person order by cat,lname;";
	  $result =  mysqli_query($db,$sql);
	  if(!result)
		  echo "ERROR in query". mysqli_error($db);
	  echo "<table>\n";
	  echo "<tr>
	     <th>Image</th>
	     <th>Last Name</th>
		 <th>First Name</th>
		 <th>Age</th>
		 <th>Category</th>
		 <th>Experience level</th>
	   </tr>";
	   while($row = mysqli_fetch_row($result)){
		   echo "<tr>";
		   echo "<td><img src=\"_imgs/$row[0]\" alt=\"runner_img\" width=\"150px\" height=\"80px\" ></td>\n";
		   foreach(array_slice($row,1) as $item)
		      echo "<td>$item</td>";
		   echo "</tr>\n";
	   }
	   echo "</table>\n";
	   mysqli_close($db);
  }

?>
<footer>Copyright &copy; 2016. All Rights Reserved.</footer>	
</body>
</html>