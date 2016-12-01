<?php
/* More, Ashwini  Account: jadrn031
                  CS545, Fall 2016
                  Project #3 */
				  
function validate_data($params) {
    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter your first name<br />";  
    elseif(strlen($params[2]) == 0)
        $msg .= "Please enter your last name<br />"; 
    elseif(strlen($params[3]) == 0)
        $msg .= "Please enter your Address<br />"; 
    elseif(strlen($params[5]) == 0)
        $msg .= "Please enter your City<br />";  
    elseif(strlen($params[5]) == 0)
        $msg .= "The city appears to be invalid, please use only characters<br />";  		
    elseif(strlen($params[6]) == 0)
        $msg .= "Please enter your State<br />";
	elseif(strlen($params[6]) != 2)
        $msg .= "The state appears to be invalid, please use the two letter state abbreviation<br />";
	elseif(strlen($params[7]) == 0)
        $msg .= "Please enter your zip code<br />";
	elseif(!is_numeric($params[7]))
        $msg .= "The zip code appears to be invalid, numbers only please<br />";
	elseif(strlen($params[7]) != 5)
        $msg .= "The zip code must have exactly five digits<br />";
	elseif(strlen($params[8]) == 0)
        $msg .= "Please enter your area code<br />";         
	elseif(!is_numeric($params[8]))
        $msg .= "The area code appears to be invalid, numbers only please<br />";     
	elseif(strlen($params[8]) != 3)
        $msg .= "The area code must have exactly three digits<br />";     
    elseif(strlen($params[9]) == 0)
        $msg .= "Please enter your phone number prefix<br />";
	elseif(!is_numeric($params[9]))
        $msg .= "The phone number prefix appears to be invalid, numbers only please<br />";
    elseif(strlen($params[9]) != 3)
        $msg .= "The phone number prefix must have exactly three digits<br />";
    elseif(strlen($params[10]) == 0)
        $msg .= "Please enter your phone number<br />";
    elseif(!is_numeric($params[10]))
        $msg .= "The phone number appears to be invalid, numbers only please<br />";
    elseif(strlen($params[10]) != 4)
        $msg .= "The phone number must have exactly four digits<br />";
    elseif(strlen($params[11]) == 0)
        $msg .= "Please enter your Email address<br />";
    elseif(!filter_var($params[11], FILTER_VALIDATE_EMAIL))
        $msg .= "The email address appears to be invalid<br/>";        
	elseif(strlen($params[14]) == 0)
        $msg .= "Please select your gender<br />";
    elseif(strlen($params[12]) == 0) 
        $msg .= "Please enter your Date of Birth<br />";
 	elseif(isValidDob($params[12]) == false)
        $msg .= "Please enter valid date in yyyy/mm/dd format<br />";
	elseif(isValidAge($params[12]) == false)
        $msg .= "Sorry, you should be atleast 16 years old to enter the Marathon<br />";
	elseif(strlen($params[15]) == 0)
        $msg .= "Please select your experience level<br />";
	elseif(strlen($params[16]) == 0)
        $msg .= "Please select your category<br />";
	elseif(strlen($params[17]) == 0)
        $msg .= "Please select your image<br />";

    if($msg) 
	{
        write_form_error_page($msg);
        exit;
    }
  }
  
function isValidDob($dob) {
	
   list($yyyy,$mm,$dd) = explode('/',$dob);
   return checkdate($mm,$dd,$yyyy);
}
    
function isValidAge($dob) {
	list($yyyy,$mm,$dd) = explode('/',$dob);
	$age = 2016 - $yyyy;
	$age_mon = 12 - $mm;
	$age_day = 4 - $dd;
	
	if($age > 100)
		return false;
	if($age_mon < 0 || ($age_mon == 0 && $age_day < 0))
		$age = $age - 1;
	if(($age == 16 && $age_mon <= 0 && $age_day <= 0) || $age < 16)
		return false;
	return true;
}    

function write_form() {
    print <<<ENDBLOCK
	<h1>Sign Up Here</h1>
<div class="header"></div>
    <fieldset>
	  <legend>Sign up</legend>
    <form name="customer" method="post" action="process_request.php" enctype="multipart/form-data">
	    <table>
		 <tr>
		 <td>
	        <table>
			  <tr>
			   <td><font color="red">*</font><label for="first_name">First Name:</label></td>
			   <td><input type="text" id="first_name" name="first_name" value="$_POST[first_name]"/></td>
			  </tr>
			  
			  <tr>
			   <td>&nbsp;<label for="middle_name">Middle Name:</label></td>
			   <td><input type="text" id="middle_name" name="middle_name" value="$_POST[middle_name]"/></td>
			  </tr>
			  
			  <tr>
			   <td><font color="red">*</font><label for="last_name">Last Name:</label></td>
			   <td><input type="text" id="last_name" name="last_name" value="$_POST[last_name]"/></td>
			  </tr>
			  
			  <tr>
			   <td><font color="red">*</font><label for="address1">Address Line 1:</label></td>
			   <td><textarea id="address1" name="address1" cols="18" rows="2">$_POST[address1]</textarea></td>
			  </tr> 
			  
			  <tr>
			   <td>&nbsp;<label for="address2">Address Line 2:</label></td>
			   <td><textarea id="address2" name="address2" cols="18" rows="2">$_POST[address2]</textarea></td>
			  </tr> 
			  
			  <tr>
			   <td><font color="red">*</font><label for="city">City:</label></td>
			   <td><input type="text" id="city" name="city" value="$_POST[city]"/></td>
              </tr>

              <tr>     			  
    			<td><font color="red">*</font><label for="state">State:</label></td>
				<td><input type="text" id="state" name="state" value="$_POST[state]"/></td>
			  </tr>
			   
			  <tr>
			    <td><font color="red">*</font><label for="zip">Zip code:</label></td>
				<td><input type="text" id="zip" name="zip" value="$_POST[zip]"/></td>  
			  </tr> 
			  
			  <tr>
		  	    <td><font color="red">*</font><label for="image">Image:</label></td>
				<td><input type="file" id="image" name="image" value="$_POST[image]"/></td>  
			  </tr> 
			  </table>
			</td>
            <td>
              <table> 			
			  <tr>
			    <td><font color="red">*</font><label for="phone">Primary phone:</label></td>
				<td>(<input type="text" id="phone1" name="phone1" size="3" maxlength="3" value="$_POST[phone1]"/>)
					<input type="text" id="phone2" name="phone2" size="3" maxlength="3" value="$_POST[phone2]"/>
					<input type="text" id="phone3" name="phone3" size="4" maxlength="4" value="$_POST[phone3]"/>
				</td>
			  </tr>
			  
			  <tr>
			   <td><font color="red">*</font><label for="email">Email address:</label></td>
			   <td><input type="text" id="email" name="email" value="$_POST[email]"/></td>	
			  </tr>
		  
			  <tr>
			    <td><font color="red">*</font><label for="gender">Gender:</label></td>      
				<td>				
ENDBLOCK;
            $gender_choice = array("Male","Female");
            foreach($gender_choice as $item) {
                echo "<input type='radio' name='gender'  value='$item'";
                if($item == $_POST[gender])
                    echo " checked='checked'";
                echo " />$item";
                }            
            echo "<br />";
                                                                                                                                                                                    
    print <<<ENDBLOCK
	           </td>
			 </tr>
			 <tr>
			    <td><font color="red">*</font><label for="dob">Date of Birth:</label></td>
				<td><input type="text" id="dob" name="dob" placeholder="yyyy/mm/dd" value="$_POST[dob]"/></td>
			  </tr>
			  
			  <tr>
			    <td><label for="medical">&nbsp;Medical Conditions:</label></td>
				<td><textarea id="medical" name="medical">$_POST[medical]</textarea></td>
			  </tr>
			  
			  <tr>
			    <td><font color="red">*</font><label for="exp">Experience level:</label></td>
				<td>
ENDBLOCK;
            $exp_choice = array("Expert","Experienced","Novice");
            foreach($exp_choice as $item) {
                echo "<input type='radio' name='exp'  value='$item'";
                if($item == $_POST[exp])
                    echo " checked='checked'";
                echo " />$item";
				echo "<br />";
                }            
                                                                                                                                                                                    
    print <<<ENDBLOCK
              </td>
		      </tr>
			  
			  <tr>
			    <td><font color="red">*</font><label for="cat">Category:</label></td>
					<td>
ENDBLOCK;
            $cat_choice = array("Teen","Adult","Senior");
            foreach($cat_choice as $item) {
                echo "<input type='radio' name='cat'  value='$item'";
                if($item == $_POST[cat])
                    echo " checked='checked'";
                echo " />$item";
				echo "<br />";
                }            
                                                                                                                                                                                    
    print <<<ENDBLOCK
            </td>
			  </tr>
			  </table>
			 </td>
		    </tr> 			 
		</table>
		<div id="btn_panel">
			<input type="button" id="clr_btn" value="Clear"/>
			<input type="submit" id="sign_btn" value="Sign Up"/><br>
		</div>
		<div id="errMsg"></div>
	</form>
	</fieldset>
ENDBLOCK;
}                                     

function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['first_name']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['middle_name']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['last_name']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone3']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['dob']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['medical']));
	$params[] = $_POST['gender'];
	$params[] = $_POST['exp'];
	$params[] = $_POST['cat'];
	$params[] = trim(str_replace($bad_chars, "",$_FILES['image']['name'])); 

    return $params;
}
    
function write_form_error_page($msg) {
       write_header();
       write_form();
	   echo "<h2 id='errMsg'>$msg</h2>";
	   echo "<footer>Copyright &copy; 2016. All Rights Reserved.</footer>";
       write_footer();
} 
	
function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM person WHERE email = '$params[11]';";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) 
	{
		write_form_error_page("Sorry, this record appears to be a duplicate");
        exit;
    }
##OK, duplicate check passed, now insert
 
    $UPLOAD_DIR = '_imgs/';
    $COMPUTER_DIR = '/home/jadrn031/public_html/proj3/_imgs/';
    $fname = $_FILES['image']['name'];
	
    if(isset($fname) && file_exists("$UPLOAD_DIR".$fname))  {
        write_form_error_page("Error, the file $fname already exists on the server");
		exit;
        }
    elseif($_FILES['image']['error'] > 0) {
    	$err = $_FILES['image']['error'];	
        echo "Error Code: $err ";
	if($err == 1)
		write_form_error_page("The file was too big to upload, the limit is 2MB");
	    exit;
        } 
    elseif(exif_imagetype($_FILES['image']['tmp_name']) != IMAGETYPE_JPEG) {
        write_form_error_page("ERROR, not a jpg file");   
		exit;
        }
## file is valid, copy from /tmp to your directory.        
    else { 
        move_uploaded_file($_FILES['image']['tmp_name'], "$UPLOAD_DIR".$fname);
       $sql = "INSERT INTO person(fname,mname,lname,address1,address2,city,state,zip,phone1,phone2,phone3,email,dob,med,gender,exp,cat,img) ".
    "VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$params[10]','$params[11]',STR_TO_DATE('$params[12]','%Y/%m/%d'),'$params[13]','$params[14]','$params[15]','$params[16]','$fname');";
	   mysqli_query($db,$sql);
    } 
    close_connector($db);
    }
        
?>   