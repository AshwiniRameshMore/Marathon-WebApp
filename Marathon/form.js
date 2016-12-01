/*  More, Ashwini   Account: jadrn031
                    CS545, Fall 2016
                    Project #3
*/

$(document).ready(function() {
    $("#first_name").focus();
    
	$("#first_name").on('blur', function() {
        if($("#first_name").val() != "") 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#last_name").on('blur', function() {
        if($("#last_name").val() != "") 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#address1").on('blur', function() {
        if($("#address1").val() != "") 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#city").on('blur', function() {
        if($("#city").val() != "") 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#state").on('blur', function() {
        if($("#state").val() != "" && isValidState($('#state').val())) 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#zip").on('blur', function() {
        if($("#zip").val() != "" && $("#zip").val().length == 5 && $.isNumeric($('#zip').val())) 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#phone1").on('blur', function() {
        if($("#phone1").val() != "" && $("#phone1").val().length == 3 && $.isNumeric($('#phone1').val()))  
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#phone2").on('blur', function() {
        if($("#phone2").val() != "" && $("#phone2").val().length == 3 && $.isNumeric($('#phone2').val()))  
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#phone3").on('blur', function() {
        if($("#phone3").val() != "" && $("#phone3").val().length == 4 && $.isNumeric($('#phone3').val()))  
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	$("#dob").on('blur', function() {
        if($("#dob").val() != "") 
		{
            $(this).removeClass("error");
            $('#errorMsg').text(""); 
        }
    });
	  $('#state').on('keyup', function() {
        $('#state').val($('#state').val().toUpperCase());
        });
	  $('#zip').on('keyup', function() {
        if($('#zip').val().length == 5)
            $('#phone1').focus();
      });    
	  $('#phone1').on('keyup', function() {
        if($('#phone1').val().length == 3)
            $('#phone2').focus();
      });    
	  $('#phone2').on('keyup', function() {
        if($('#phone2').val().length == 3)
            $('#phone3').focus();
      });   
	  $('#phone3').on('keyup', function() {
        if($('#phone3').val().length == 4)
            $('#email').focus();
      });   	  
   
   	$('#clr_btn').on('click',function(e){
			$('#first_name').val("");
			$('#middle_name').val("");
			$('#last_name').val("");
			$('#address1').val("");
			$('#address2').val("");
			$('#city').val("");
			$('#state').val("");
			$('#zip').val("");
			$('#phone1').val("");
			$('#phone2').val("");
			$('#phone3').val("");
			$('#email').val("");
			$("input[name='gender']").prop('checked', false);
			$('#dob').val("");
			$('#medical').val("");
			$("input[name='exp']").prop('checked', false);
			$("input[name='cat']").prop('checked', false);
			$('#first_name').focus();
			$('#errMsg').text("");
	});
	
	$('#sign_btn').on('click',function(e){
		if($("#first_name").val() == "")
        {
            $("#first_name").addClass("error");
            $('#errMsg').text("Please enter your first name");
		    $("#first_name").focus();
            e.preventDefault();
        }
		else if(new RegExp('^([a-zA-Z]+[a-z A-Z]*)$').test($("#first_name").val()) == false)
		{
         $("#first_name").addClass("error");
         $('#errMsg').text("The first name appears to be invalid, please use only characters");
         $("#first_name").focus();
         e.preventDefault();
		}
		else if($('#last_name').val().trim() == "")
		{
			$('#last_name').addClass("error"); 
            $('#errMsg').text("Please enter your last name");
			$('#last_name').focus();
			e.preventDefault();
		}
		else if(new RegExp('^([a-zA-Z]+[a-z A-Z]*)$').test($("#last_name").val()) == false)
		{
         $("#last_name").addClass("error");
         $('#errMsg').text("The last name appears to be invalid, please use only characters");
         $("#last_name").focus();
         e.preventDefault();
		}
		else if($('#address1').val().trim() == "")
		{
			$('#address1').addClass("error"); 
            $('#errMsg').text("Please enter your Address");
			$('#address1').focus();
			e.preventDefault();
		} 
		else if($('#city').val().trim() == "")
		{
			$('#city').addClass("error"); 
            $('#errMsg').text("Please enter your City");
			$('#city').focus();
			e.preventDefault();
		}
		else if(new RegExp('^([a-zA-Z]+[a-z A-Z]*)$').test($('#city').val()) == false)
        {
			$('#city').addClass("error");
			$('#errMsg').text("The city appears to be invalid, please use only characters");
			$('#city').focus();
			e.preventDefault();
		}
		else if($('#state').val().trim() == "")
		{
			$('#state').addClass("error"); 
            $('#errMsg').text("Please enter your State");
			$('#state').focus();
			e.preventDefault();
		} 
		else if(!isValidState($('#state').val()))
		{
			$('#state').addClass("error"); 
            $('#errMsg').text("The state appears to be invalid, please use the two letter state abbreviation");
			$('#state').focus();
			e.preventDefault();
		} 
		else if($('#zip').val().trim() == "")
		{
			$('#zip').addClass("error"); 
            $('#errMsg').text("Please enter your Zip code");
			$('#zip').focus();
			e.preventDefault();
		}
		else if(!$.isNumeric($('#zip').val()))
		{
			$('#zip').addClass("error"); 
            $('#errMsg').text("The zip code appears to be invalid, numbers only please");
			$('#zip').val("");
			$('#zip').focus();
			e.preventDefault();
		}
		else if($('#zip').val().length != 5)
		{
			$('#zip').addClass("error"); 
            $('#errMsg').text("The zip code must have exactly five digits");
			$('#zip').focus();
			e.preventDefault();
		}
		else if($('#phone1').val().trim() == "")
		{
			$('#phone1').addClass("error"); 
            $('#errMsg').text("Please enter your area code");
			$('#phone1').focus();
			e.preventDefault();
		} 
		else if(!$.isNumeric($('#phone1').val()))
		{
			$('#phone1').addClass("error"); 
            $('#errMsg').text("The area code appears to be invalid, numbers only please");
			$('#phone1').val("");
			$('#phone1').focus();
			e.preventDefault();
		}
		else if($('#phone1').val().length != 3)
		{
			$('#phone1').addClass("error"); 
            $('#errMsg').text("The area code must have exactly three digits");
			$('#phone1').focus();
			e.preventDefault();
		}
		else if($('#phone2').val().trim() == "")
		{
			$('#phone2').addClass("error"); 
            $('#errMsg').text("Please enter your phone number prefix");
			$('#phone2').focus();
			e.preventDefault();
		}
		else if(!$.isNumeric($('#phone2').val()))
		{
			$('#phone2').addClass("error"); 
            $('#errMsg').text("The phone number prefix appears to be invalid, numbers only please");
			$('#phone2').val("");
			$('#phone2').focus();
			e.preventDefault();
		}
		else if($('#phone2').val().length != 3)
		{
			$('#phone2').addClass("error"); 
            $('#errMsg').text("The phone number prefix must have exactly three digits");
			$('#phone2').focus();
			e.preventDefault();
		}
		else if($('#phone3').val().trim() == "")
		{
			$('#phone3').addClass("error"); 
            $('#errMsg').text("Please enter your phone number");
			$('#phone3').focus();
			e.preventDefault();
		}
		else if(!$.isNumeric($('#phone3').val()))
		{
			$('#phone3').addClass("error"); 
            $('#errMsg').text("The phone number appears to be invalid, numbers only please");
			$('#phone3').val("");
			$('#phone3').focus();
			e.preventDefault();
		}
		else if($('#phone3').val().length != 4)
		{
			$('#phone3').addClass("error"); 
            $('#errMsg').text("The phone number must have exactly four digits");
			$('#phone3').focus();
			e.preventDefault();
		}		
		else if($('#email').val().trim() == "")
		{
			$('#email').addClass("error"); 
            $('#errMsg').text("Please enter your Email address");
			$('#email').focus();
			e.preventDefault();
		} 
		else if(!isValidEmail($('#email').val())) 
		{
			$('#email').addClass("error"); 
            $('#errMsg').text("The email address appears to be invalid");
			$('#email').focus();
			e.preventDefault();
		}
		else if(!$("input[name='gender']").is(':checked'))
		{
            $('#errMsg').text("Please select your gender");
			e.preventDefault();
		}
		else if($('#dob').val().trim() == "")
		{
			$('#dob').addClass("error"); 
            $('#errMsg').text("Please enter your Date of Birth");
			$('#dob').focus();
			e.preventDefault();
		}
		else if(!isValidDob($('#dob').val()))
		{
			$('#dob').addClass("error"); 
            $('#errMsg').text("Please enter valid date in yyyy/mm/dd format");
			$('#dob').focus();
			e.preventDefault();			
		}
		else if(!$("input[name='exp']").is(':checked'))
		{
            $('#errMsg').text("Please select your experience level");
			e.preventDefault();
		}
		else if(!$("input[name='cat']").is(':checked'))
		{
            $('#errMsg').text("Please select your category");
			e.preventDefault();
		}
		 else if($("#image").val() == "")
        {
            $("#image").addClass("error");
            $('#errMsg').text("Please select your Image");
            $("#image").focus();
            e.preventDefault();
        }
		else
		{
		     e.preventDefault();
      	     var params = "email=" + $('#email').val();
             var url="check_dup.php?"+params;
             $.get(url, dup_handler);
		}
	});
	
});

function calculateAge(birthday) {
	
	 var nowyear = 2016;
     var nowmonth = 12;
     var nowday = 4;

	 var res = birthday.split(" ");
     var birthyear = res[0];
     var birthmonth = res[1];
     var birthday = res[2];

     var age = nowyear - birthyear;
     var age_month = nowmonth - birthmonth;
     var age_day = nowday - birthday;

     if (age > 100) {
         return false;
     }
     if (age_month < 0 || (age_month == 0 && age_day < 0)) {
         age = parseInt(age) - 1;
     }
     if ((age == 16 && age_month <= 0 && age_day <= 0) || age < 16) {
         return false;
     }
     return true;
}

function isValidDob(dob) 
{
 var dateformat = /^\d{4}[\/](0?[1-9]|1[012])[\/](0?[1-9]|[12][0-9]|3[01])$/;
 return new RegExp(dateformat).test(dob);
}         
function isValidState(state) 
{                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
}  
function isValidEmail(emailAddress) 
{
   var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
   return pattern.test(emailAddress);
}       

function dup_handler(response) {
    if(response == "dup")
	{
        $('#errMsg').text("Sorry, this record appears to be a duplicate");
    }else if(response == "OK") {
        $('form').serialize();
        $('form').submit();
        }
    else
        alert(response);
}