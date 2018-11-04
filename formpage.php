<?php include "formfunctions.php"?>
<!--this file should be php, when saved as HTML with php include as a body the php code is displayed in the form. Why?-->
<html>
<head>
</head>
<body>

<form action = "formpage.php" method = "POST">
<p>Name </p><input type = "text" name = "name" value = "<?php echopostvariable('name'); ?>">
<p><?php validatepostvariable('name');?></p>
<p>Surname </p><input type = "text" name = "surname" value = "<?php echopostvariable('surname'); ?>">
<p><?php validatepostvariable('surname');?></p>
<p>E-mail address</p><input type = "text" name = "email" value = "<?php echopostvariable('email'); ?>">
<p><?php validatepostvariable('email');validateemail('email');?></p>

<p>Confirm e-mail address</p><input type = "text" name = "confirmemail" value = "<?php echopostvariable('confirmemail'); ?>">
<p><?php validatepostvariable('confirmemail');validateemail ('confirmemail'); validatecomparedemails ('email','confirmemail');//compareemail ('email', 'confirmemail')?></p>

<p>Gender: 
<input type="radio" name="gender" value = "male"> Male 
<input type="radio" name="gender" value = "female" checked = "checked"> Female </p>

<input type="submit" value = "Submit" />
<?php SaveReservation();?>
</form>

</body>

</html>
