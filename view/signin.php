<?php if(!empty($errorList)) : ?>
	<div class="alert alert-danger" role="alert">
	<?php foreach($errorList as $currentError) : ?>
		<?= $currentError ?><br>
	<?php endforeach; ?>
	</div>
<?php endif; ?>

<form action="" method="post">
	<fieldset>
		<input type="email" class="form-control" name="emailStudent" value="" placeholder="Email address" /><br />
		<input type="password" class="form-control" name="passwordStudent1" value="" placeholder="Your password" /><br />
		<input type="submit" class="btn btn-success btn-block" value="Sign in" />
	</fieldset>
</form>