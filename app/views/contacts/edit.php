<?php $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-8 offset-md-2 card">
	<div class="card-body">
		<h2 class="text-center">
			Edit <?php echo $this->contact->displayName(); ?>
		</h2>
		
		<?php $this->partial('contacts', 'form'); ?>
	</div>
</div>
<?php $this->end(); ?>