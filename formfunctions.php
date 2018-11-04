<?php
include('ConnectionConstants.php');
include('sqlfunctions.php');
include('messages.php');


function isPost(){
	return $_SERVER['REQUEST_METHOD'] === 'POST';
}//checking if post happenned (Submit button pressed)

function isfilled($formfield){	
	if(isPost() && !empty($_POST[$formfield])){
		return true;
	}
	return false;
}//checking if the field is filled in

function validatepostvariable($formfield){
	if (isPost() && !isfilled($formfield)){
		echo "Please fill in ".$formfield;
	   }
}//send an error if the field is not filled

function echopostvariable($formfield){
	if (isfilled($formfield)){
		echo $_POST[$formfield];
	}
}//echo the value filled in the box

function isemailformatcorrect($emailinput){	
	if (isPost() && filter_var ($_POST[$emailinput], FILTER_VALIDATE_EMAIL) ) {
		return true;
	}
	return false;
		
}//checks that the email format is correct

function validateemail($emailinput){
	if (!isemailformatcorrect ($emailinput)&& isfilled($emailinput))
	{
		echo "Incorrect format of email";
	}
}//send an error if the email is incorrect


function compareemails($email1, $email2){	
	if (isPost()){
		if (($_POST[$email1]) == ($_POST[$email2]))
    return true;
    }
    return false;	
}//get confirmemail and compare to first one

function validatecomparedemails ($email1, $email2){
	if (isfilled ($email1) && isfilled ($email2) &&!compareemails($email1, $email2)){
		echo "Emails should match";
	}
}// if the emails don't match display an error

function SaveReservation (){
	if (isfilled('name') && isfilled('surname') && isfilled ('email') && isfilled('gender')
		&& isemailformatcorrect('email') 
	    && compareemails ('email','confirmemail'))
	{
	$name=$_POST['name'];
	$surname = $_POST['surname'];
	$email= $_POST ['email'];
	$gender = $_POST['gender'];

	$conn = getconnection();

	$sql = "INSERT INTO reservations_training (name, surname, email, gender)
	VALUES ('$name','$surname','$email','$gender')";

	if (mysqli_query($conn, $sql)) {
		echo RESERVATIONSUCCESS;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	}
}
?>