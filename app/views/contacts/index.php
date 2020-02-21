<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
	<h2 class="text-center">My Contacts</h2>
	
	<table class="table table-striped table-bordered">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Cell Phone</th>
			<th>Home Phone</th>
			<th>Work Phone</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($this->contacts as $contact): ?>
				<tr>
					<td>
						<?php echo displayName($contact);//echo $contact->displayName(); ?>
					</td>
					<td>
						<?php echo $contact->email; ?>
					</td>
					<td>
						<?php echo $contact->cell_phone; ?>
					</td>
					<td>
						<?php echo $contact->home_phone; ?>
					</td>
					<td>
						<?php echo $contact->work_phone; ?>
					</td>
					<td>
						
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php $this->end(); ?>