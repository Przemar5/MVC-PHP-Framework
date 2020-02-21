<form action="<?php echo $this->postAction; ?>" method="post" class="form">
	<div class="bg-light form-errors">
		<?php echo $this->displayErrors; ?>
	</div>
	
	<div class="row">
		<?php echo inputBlock('text', 'First Name', 'fname', $this->contact->fname, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Last Name', 'lname', $this->contact->lname, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Address', 'address', $this->contact->address, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Address 2', 'address2', $this->contact->address2, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'City', 'city', $this->contact->city, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Zip Code', 'zip', $this->contact->zip, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('email', 'Email', 'email', $this->contact->email, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Cell Phone', 'cell_phone', $this->contact->cell_phone, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Home Phone', 'home_phone', $this->contact->home_phone, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
		<?php echo inputBlock('text', 'Work Phone', 'work_phone', $this->contact->work_phone, 
							  ['class' => 'form-control'], ['class' => 'form-group col-md-6']); ?>
	</div>
	<div class="col-md-12 text-right">
		<a href="<?php echo PROOT; ?>contacts" class="btn btn-default">Cancel</a>
		<?php echo submitTag('Save', ['class' => 'btn btn-primary']); ?>
	</div>
</form>