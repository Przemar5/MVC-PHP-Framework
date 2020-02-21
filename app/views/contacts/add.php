<?php echo $this->setSiteTitle('Add a Contact'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="col-md-8 offset-md-2 card">
	<div class="card-body">
		<h2 class="text-center">Add a Contact</h2>
		<hr>

		<?php $this->partial('contacts', 'form'); ?>
	</div>
</div>
<?php $this->end(); ?>