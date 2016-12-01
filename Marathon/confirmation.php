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
    <title>Confirmation</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php
echo <<<ENDBLOCK
    <h1>SDSU Marathon</h1>
	<div class="header"></div>
	<h2>$params[0], thank you for registering</h2>
	
    <table>
        <tr>
            <td>First Name</td>
            <td>$params[0]</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>$params[3] $params[4], $params[5], $params[6], $params[7] </td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>$params[8]-$params[9]-$params[10]</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>$params[11]</td>
        </tr>           
        <tr>
            <td>Date of Birth</td>
            <td>$params[12]</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>$params[14]</td>
        </tr> 
        <tr>
            <td>Experience Level</td>
            <td>$params[15]</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>$params[16]</td>
        </tr>  		
    </table>     
<footer>Copyright &copy; 2016. All Rights Reserved.</footer>	
ENDBLOCK;

?>
</body>
</html>