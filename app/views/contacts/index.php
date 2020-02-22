<?php $this->start('head'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
	<h2 class="text-center">My Contacts</h2>
	
	<table class="table table-striped table-bordered table-hover">
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
						<a href="<?php echo PROOT; ?>contacts/details/<?php echo $contact->id; ?>">
							<?php print($contact->id); echo $contact->displayName();//echo $contact->displayName(); ?>
						</a>
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
						<a href="<?php echo PROOT; ?>contacts/edit/<?php echo $contact->id; ?>" class="btn btn-info btn-sm">
							<i class="fas fa-pencil-alt"></i> Edit
						</a>
						
						<a href="<?php echo PROOT; ?>contacts/delete/<?php echo $contact->id; ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('Are you sure?')){return false;}">
							<i class="fas fa-times"></i> Delete
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php $this->end(); ?>