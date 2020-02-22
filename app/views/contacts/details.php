<?php $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-8 offset-md-2 card">
	<div class="card-body">
		<a href="<?php echo PROOT; ?>contacts" class="btn btn-sm btn-default">Back</a>
	</div>
	
	<h2 class="text-center">
		<?php echo $this->contact->displayName(); ?>
	</h2>
	
	<div class="row px-3">
		<div class="col-md-6">
			<p>
				<span class="font-weight-bold">
					Email: 
				</span>
				<?php echo $this->contact->email; ?>
			</p>
			<p>
				<span class="font-weight-bold">
					Cell Phone: 
				</span>
				<?php echo $this->contact->cell_phone; ?>
			</p>
			<p>
				<span class="font-weight-bold">
					Home Phone: 
				</span>
				<?php echo $this->contact->home_phone; ?>
			</p>
			<p>
				<span class="font-weight-bold">
					Work Phone: 
				</span>
				<?php echo $this->contact->work_phone; ?>
			</p>
		</div>

		<div class="col-md-6 text-md-right">
			<?php echo $this->contact->displayAddress(); ?>
		</div>
	</div>
</div>
<?php $this->end(); ?>