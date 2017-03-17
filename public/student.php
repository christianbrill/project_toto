<?php

require dirname(dirname(__FILE__)).'/inc/config.php';


//======================================================== 
// select all student information
//======================================================== 
$infoOneStudent = '
	SELECT *
	FROM student
';

$result = $pdo->query($infoOneStudent);
$resultList = $result->fetch(PDO::FETCH_ASSOC);


//======================================================== 
// sending id information to the /view/student.php page
//======================================================== 
$studentId = isset($_GET['id']) ? intval($_GET['id']) : 0; // intval will make sure that the value gotten from GET is not a string but an integer

$selectStudent = '
	SELECT stu_id, stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, cit_name, TIMESTAMPDIFF(YEAR, stu_birthdate, CURDATE()) AS age 
	FROM student
	INNER JOIN city 
	ON city.cit_id = student.city_cit_id
	WHERE stu_id = :studentID
';

$pdoStatement = $pdo->prepare($selectStudent);
$pdoStatement->bindValue(':studentID', $_GET['stu_ID']);

if($pdoStatement->execute() === false){
	print_r($pdoStatement->errorInfo());
} else {
	$resList = $pdoStatement->fetch(PDO::FETCH_ASSOC);
}



//======================================================== 
// file inclusion
//======================================================== 
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/student.php';
include dirname(dirname(__FILE__)).'/view/footer.php';

