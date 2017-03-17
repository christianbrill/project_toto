<?php if(!empty($errorList)) : ?>
	<div style="width:400px; margin: auto;" class="alert alert-danger" role="alert">
	<?php foreach($errorList as $currentError) : ?>
		<?= $currentError ?><br>
	<?php endforeach; ?>
	</div>
<?php endif; ?>

<form action="" method="post">
	<fieldset>
		<input type="email" class="form-control" name="emailStudent" value="" placeholder="Email address" /><br />
		<input type="password" class="form-control" name="passwordStudent1" value="" placeholder="Your password" /><br />
		<input type="password" class="form-control" name="passwordStudent2" value="" placeholder="Confirm your password" /><br />
		<input type="submit" class="btn btn-success btn-block" value="Sign up" />
	</fieldset>
</form>


