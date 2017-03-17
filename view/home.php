<table>
	<tr>
		<th>Location</th>
		<th>Session Name</th>
		<th>Start Date</th>
		<th>End Date</th>
	</tr>
	<?php foreach($sessionList as $key => $value): ?>
	<tr>	
		<td><?= $value['loc_name'] ?></a></td>
		<td><?= $value['tra_name'] ?></a></td>
		<td><?= $value['ses_start_date'] ?></a></td>
		<td><?= $value['ses_end_date'] ?></a></td>
	</tr>
	<?php endforeach; ?>
	<tr>
		<th><a href="list.php?location=<?=$value['loc_name']?>">Go to</a></th>
		<th><a href="list.php?sessionName=<?=$value['tra_name']?>">Go to</a></th>
		<th><a href="list.php?startDate=<?=$value['ses_start_date']?>">Go to</a></th>
		<th><a href="list.php?endDate=<?=$value['ses_end_date']?>">Go to</a></th>
	</tr>
</table>