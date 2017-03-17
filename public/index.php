<?php

// Inclusion of the config file
require dirname(dirname(__FILE__)).'/inc/config.php';

$allSessionInfo = '
	SELECT tra_name, ses_start_date, ses_end_date, loc_name, tra_name
	FROM session
	INNER JOIN location
	ON location.loc_id = session.location_loc_id
	INNER JOIN training
	ON training.tra_id = session.training_tra_id
';

$result = $pdo->query($allSessionInfo);
$sessionList = $result->fetchAll(PDO::FETCH_ASSOC);

// The views are ALWAYS at the end
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/home.php';
include dirname(dirname(__FILE__)).'/view/footer.php';