<?php $this->setSiteTitle('Home'); ?>
<?php $this->start('head'); ?>
<meta content="test">
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<h1 class="text-center red">Welcome to MVC Framework!</h1>
<div onclick="ajaxTest();">Click Me!</div>

<script>
	function ajaxTest()
	{
		$.ajax({
			type: 'POST',
			url: '<?php echo PROOT; ?>home/testAjax',
			data: {model_id: 45},
			success: function(response) {
				if (response.success) {
					window.alert('success!')
				}
				console.log(response);
			}
		})
	}
</script>
<?php $this->end(); ?>
