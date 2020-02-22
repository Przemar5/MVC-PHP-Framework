<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-6 offset-md-3 card bg-light">
	<form action="<?php echo PROOT; ?>register/login" method="post" class="form card-body">
		<?php echo FormHelper::csrfInput(); ?>
		
		<div>
			<?php echo $this->displayErrors; ?>
		</div>
		
		<h3 class="text-center">Log In</h3>
		
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		
		<div class="checkbox">
			<label for="remember_me">Remember Me
				<input type="checkbox" name="remember_me" id="remember_me" value="on">
			</label>
		</div>
		
		<div class="form-group">
			<input type="submit" value="Login" class="btn btn-large btn-primary">
		</div>
		
		<div class="text-right">
			<a href="<?php echo PROOT; ?>register/register" class="text-primary">
				Register
			</a>
		</div>
	</form>
</div>
<?php $this->end(); ?>