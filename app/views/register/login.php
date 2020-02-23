<?php

use Core\FormHelper;

?>


<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-6 offset-md-3 card bg-light">
	<div class="card-body">
		<h3 class="text-center">Log In</h3>

		<form action="<?php echo PROOT; ?>register/login" method="post">
			<?php echo FormHelper::csrfInput(); ?>

			<?php echo FormHelper::displayErrors($this->displayErrors); ?>

			<?php echo FormHelper::inputBlock('text', 'Username', 'username', $this->login->username,
										['class' => 'form-control'], ['class' => 'form-group']); ?>
			<?php echo FormHelper::inputBlock('password', 'Password', 'password', $this->login->password,
										['class' => 'form-control'], ['class' => 'form-group']); ?>
			<?php echo FormHelper::checkboxBlock('Remember Me', 'remember_me', false,
										['class' => 'ml-1'], ['class' => 'form-group']); ?>
			<?php echo FormHelper::submitBlock('Login', ['class' => 'btn btn-lg btn-primary'],
											  ['class' => 'form-group']); ?>

			<div class="text-right">
				<a href="<?php echo PROOT; ?>register/register" class="text-primary">
					Register
				</a>
			</div>
		</form>
	</div>
</div>
<?php $this->end(); ?>