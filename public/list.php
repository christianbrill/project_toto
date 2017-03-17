<?php

require dirname(dirname(__FILE__)).'/inc/config.php';

//--------------------------------------------------
// this gets the page number for the previous 
// and next buttons added to the page
//--------------------------------------------------
if(isset($_GET['page'])){
	$pageNumber = $_GET['page'];
} else {
	$pageNumber = 1;
}

$pageOffset = ($pageNumber - 1) * 5;


$infoAboutAllStudents = '
	SELECT *
	FROM student
	LIMIT 5 OFFSET '.$pageOffset.'
';

$result = $pdo->query($infoAboutAllStudents);
$resultList = $result->fetchAll(PDO::FETCH_ASSOC);


//--------------------------------------------------
// Getting the session info that was
// sent over from home.php
// If the values sent over are set, then they
// will be applied to the respective variables.
// If not, the values are set to 0 to not
// have any errors.
//--------------------------------------------------
if(isset($_GET['location'])){
	$location = $_GET['location'];

	$retrieveLocation = '
		SELECT * 
		FROM student
		
	';

	$infoRequest = $pdo->query($retrieveLocation);
	$locationList = $infoRequest->fetchAll(PDO::FETCH_ASSOC);
} else {
	$location = 0;
}



if(isset($_GET['sessionName'])){
	$sessionName = $_GET['sessionName'];

	$retrieveSessions = '
		SELECT * 
		FROM session
	';

	$infoRequest = $pdo->query($retrieveLocation);
	$locationList = $infoRequest->fetchAll(PDO::FETCH_ASSOC);
} else {
	$sessionName = 0;
}



if(isset($_GET['startDate'])){
	$startDate = $_GET['startDate'];
} else {
	$startDate = 0;
}



if(isset($_GET['endDate'])){
	$endDate = $_GET['endDate'];
} else {
	$endDate = 0;
}

// file inclusion
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/list.php';
include dirname(dirname(__FILE__)).'/view/footer.php';