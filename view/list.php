<table>
	<tr>
		<th>ID</th>
		<th>Last Name</th>
		<th>First Name</th>
		<th>Email</th>
		<th>Date of Birth</th>
		<th>User Info</th>
	</tr>
	<?php foreach($resultList as $key => $value): ?>
	<tr>	
		<td><?= $value['stu_id'] ?></td>
		<td><?= $value['stu_lastname'] ?></td>
		<td><?= $value['stu_firstname'] ?></td>
		<td><?= $value['stu_email'] ?></td>
		<td><?= $value['stu_birthdate'] ?></td>

		<td>
			<button class="btn btn-primary"><a style="color: white" href="./student.php?stu_ID=<?=$value['stu_id']?>">Go to Student</a></button>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php if($pageNumber > 1): ?>
<button class="btn btn-success"><a href="list.php?page=<?= --$pageNumber ?>">Prev</a></button>
<?php endif; ?>
<button class="btn btn-success"><a href="list.php?page=<?= ++$pageNumber ?>">Next</a></button>

<!-- upload an image -->
<h1 style="text-align: center; color: white;">Upload an image of a student</h1>
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="studentPic"> <br>
	<input type="submit" name="submit">
</form>