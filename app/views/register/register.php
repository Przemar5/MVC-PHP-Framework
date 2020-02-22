
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-6 offset-md-3 well">
	<h3 class="text-center">Register</h3>
	
	<form action="" method="post" class="form">
		<?php echo FormHelper::csrfInput(); ?>

		<?php echo FormHelper::displayErrors($this->displayErrors); ?>
		
		<?php echo FormHelper::inputBlock('text', 'First Name', 'fname', $this->newUser->fname, 
										  ['class' => 'form-control input-sm'], ['class' => 'form-group']); ?>
		<?php echo FormHelper::inputBlock('text', 'Last Name', 'lname', $this->newUser->lname, 
										  ['class' => 'form-control input-sm'], ['class' => 'form-group']); ?>
		<?php echo FormHelper::inputBlock('email', 'Email Address', 'email', $this->newUser->email, 
										  ['class' => 'form-control input-sm'], ['class' => 'form-group']); ?>
		<?php echo FormHelper::inputBlock('text', 'Username', 'username', $this->newUser->username, 
										  ['class' => 'form-control input-sm'], ['class' => 'form-group']); ?>
		<?php echo FormHelper::inputBlock('password', 'Password', 'password', $this->newUser->password, 
										  ['class' => 'form-control input-sm'], ['class' => 'form-group']); ?>
		<?php echo FormHelper::inputBlock('password', 'Confirm Password', 'confirm', $this->newUser->getConfirm(), 
										  ['class' => 'form-control input-sm'], ['class' => 'form-group']); ?>
		<?php echo FormHelper::submitBlock('Register', ['class' => 'btn btn-primary btn-lg'], ['class' => 'text-right']); ?>
	</form>
</div>
<?php $this->end(); ?>