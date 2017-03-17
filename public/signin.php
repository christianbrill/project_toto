<?php

require dirname(dirname(__FILE__)).'/inc/config.php';


if(!empty($_POST)) {
	// session ID
	echo 'Session ID: ' . session_id() . '<br>';

	// user IP address
	// $userIPAddress = $_SESSION['HTTP_CLIENT_IP'];
	// echo $userIPAddress;

	function getUserIP(){
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP)) {
	        $ip = $client;
	    } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
	        $ip = $forward;
	    } else {
	        $ip = $remote;
	    }
	    return $ip;
	}

	$user_ip = getUserIP();

	echo $user_ip . '<br>';


	// check if signin fields have been filled properly
	$emailStudent = isset($_POST['emailStudent']) ? trim($_POST['emailStudent']) : '';
	$passwordStudent = isset($_POST['passwordStudent']) ? trim($_POST['passwordStudent']) : '';

	// creation of array of terrors
	$errorList = array();

	if (empty($emailStudent)) {
		$errorList[] = 'Email not filled in';
	}

	// validation of information if errorList is empty
	if(empty($errorList)) {

		$showInfoFromDB = '
			SELECT usr_id, usr_password
			FROM user
			WHERE usr_email = :email
		';

		$request = $pdo->prepare($showInfoFromDB);
		$request->bindValue(':email', $emailStudent);

		// execution
		if($request->execute() === false){
			print_r($request->errorInfo());
		} else {

			if($request->rowCount() > 0){
				$row = $request->fetch(PDO::FETCH_ASSOC);

				if(password_verify($passwordStudent, $row['usr_password'])){
					echo 'Connection successful';
					// session ID
					echo 'Session ID: ' . session_id() . '<br>';

					$userID =
				} else {
					echo 'Connection failed';
				}
			} else {
				echo 'No valid email';
			}
		}
	}
}




// file inclusion
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/signin.php';
include dirname(dirname(__FILE__)).'/view/footer.php';
