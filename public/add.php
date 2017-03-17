<?php

require dirname(dirname(__FILE__)).'/inc/config.php';

//=====================================
// CITY SELECT
//=====================================
$showCities = '
	SELECT cit_name
	FROM city
';

$cityResult = $pdo->query($showCities);
$cityResultList = $cityResult->fetchAll(PDO::FETCH_ASSOC);


//=====================================
// SESSION SELECT
//=====================================
$showSessions = '
	SELECT ses_number
	FROM session
';

$sessionsResult = $pdo->query($showSessions);
$sessionsResultList = $sessionsResult->fetchAll(PDO::FETCH_ASSOC);


//=====================================
// ADDING INFO TO DATABASE
//=====================================
$insertStudentInfo = '
	INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_birthdate, cit_name, ses_number, stu_friendliness,)
	VALUES (:lastName, :firstName, :email, :birthDate, :city, :session, :friendliNess)
	INNER JOIN city
	ON city.cit_id = student.city_cit_id
	INNER JOIN session
	ON session.ses_id = student.session_ses_id
';

$pdoStatement = $pdo->prepare($insertStudentInfo);
	$pdoStatement->bindValue(':lastName', $_POST['lastname']);
	$pdoStatement->bindValue(':firstName', $_POST['firstname']);
	$pdoStatement->bindValue(':email', $_POST['email']);
	$pdoStatement->bindValue(':birthDate', $_POST['birthdate']);
	$pdoStatement->bindValue(':city', $_POST['city']);
	$pdoStatement->bindValue(':session', $_POST['session'], PDO::PARAM_INT);
	$pdoStatement->bindValue(':friendliNess', $_POST['friendliness']);




/*if(isset($_POST['lastname'])){
	$lastname = $_POST['lastname'];
	$pdoStatement->bindValue(':lastName', $lastname);
} else {
	$lastname = 0;
}

if(isset($_POST['firstname'])){
	$firstname = $_POST['firstname'];
	$pdoStatement->bindValue(':firstName', $_POST['firstname']);
} else {
	$firstname = 0;
}

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$pdoStatement->bindValue(':email', $_POST['email']);
} else {
	$email = 0;
}

if(isset($_POST['birthdate'])){
	$birthdate = $_POST['birthdate'];
	$pdoStatement->bindValue(':birthDate', $_POST['birthdate']);
} else {
	$birthdate = 0;
}

if(isset($_POST['city'])){
	$city = $_POST['city'];
	$pdoStatement->bindValue(':city', $_POST['city']);
} else {
	$city = 0;
}

if(isset($_POST['session'])){
	$session = $_POST['session'];
	$pdoStatement->bindValue(':session', $_POST['session'], PDO::PARAM_INT);
} else {
	$session = 0;
}

if(isset($_POST['friendliness'])){
	$friendliness = $_POST['friendliness'];
	$pdoStatement->bindValue(':friendliNess', $_POST['friendliness']);
} else {
	$friendliness = 0;
}*/

if($pdoStatement->execute() === false){
	print_r($pdoStatement->errorInfo());
} else {
	$resList = $pdoStatement->fetch(PDO::FETCH_ASSOC);
}



//=====================================
// FILE INCLUSION
//=====================================
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/add.php';
include dirname(dirname(__FILE__)).'/view/footer.php';