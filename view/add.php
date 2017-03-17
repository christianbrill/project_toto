<!-- ===================================
				FORM 
=====================================-->
<form action="./add.php" method="post">
	<h1>Add a Student</h1>
	<p>Please fill in all fields.</p><br>

	<label for="lastname">Last Name:</label><br>
	<input type="text" name="lastname" id="lastname" value="" placeholder="Lastname"><br>

	<label for="firstname">First Name:</label><br>
	<input type="text" name="firstname" id="firstname" value="" placeholder="Firstname"><br>

	<label for="email">Email:</label><br>
	<input type="text" name="email" id="email" value="" placeholder="Email"><br>

	<label for="birthdate">Date of Birth:</label><br>
	<input type="text" name="birthdate" id="birthdate" value="" placeholder="1990-12-22"><br>

	<label for="city">City:</label><br>
	<select name="city">
		<option>Please select a city</option>
		<?php foreach($cityResultList as $key => $city): ?>
			<option><?= $city['cit_name'] ?></option>
		<?php endforeach; ?>
	</select><br>

	<label for="session">Session:</label><br>
	<select name="session">
		<option>Please select a session</option>
		<?php foreach($sessionsResultList as $key => $session): ?>	
			<option><?= $session['ses_number'] ?></option>
		<?php endforeach; ?>
	</select>

	<label for="friendliness">Friendliness Level:</label><br>
	<input type="number" name="friendliness" id="friendliness" value="" placeholder="Friendliness Level"><br><br>
	
	<input type="submit" name="submit" id="submit"><br>
</form>