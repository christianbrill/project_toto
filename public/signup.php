<?php

require dirname(dirname(__FILE__)).'/inc/config.php';


if(!empty($_POST)){
	// verifies if the field has been filled
	$emailStudent = isset($_POST['emailStudent']) ? trim($_POST['emailStudent']) : '';
	$passwordStudent1 = isset($_POST['passwordStudent1']) ? trim($_POST['passwordStudent1']) : '';
	$passwordStudent2 = isset($_POST['passwordStudent2']) ? trim($_POST['passwordStudent2']) : '';

	// creation of array of errors
	$errorList = array();

	// now for the validation of the sent data via the error array
	if(empty($emailStudent)){
		$errorList[] = 'No email given';
	}

	// password must be at least 8 characters long
	if(strlen($passwordStudent1) < 8){
		$errorList[] = 'Password must be at least 8 characters long';
	}

	// password must have at least one number
	if(!preg_match('/[0-9]/', $passwordStudent1)){
		$errorList[] = 'Password must have at least 1 number';
	}

	// password must have at least one uppercase letter
	if(!preg_match('/[A-Z]/', $passwordStudent1)){
		$errorList[] = 'Password must contain at least one uppercase letter';
	}

	if($passwordStudent1 != $passwordStudent2) {
		$errorList[] = "The two passwords don't match";
	}

	// if there is no error, do this:
	if(empty($errorList)){
		// send the request to fill in the database with the given data
		$sendInfoToDB = '
			INSERT INTO user (usr_email, usr_password, usr_inserted)
			VALUES (:email, :password, NOW())
		';

		$request = $pdo->prepare($sendInfoToDB);

		$request->bindValue(':email', $emailStudent);
		$request->bindValue(':password', password_hash($passwordStudent1, PASSWORD_BCRYPT));

		// execute the request to push the data into the database
		if($request->execute() === false){
			$errorList[] = "Email already taken";
		} else {
			echo 'Sign-up successful';
			// session ID
			echo 'Session ID: ' . session_id() . '<br>';
			exit;
		}
	}
}




// file inclusion
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/signup.php';
include dirname(dirname(__FILE__)).'/view/footer.php';
