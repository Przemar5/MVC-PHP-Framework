<?php

use Core\Session;

?>


<!doctype html>
<html lang="en">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title><?php echo $this->siteTitle(); ?></title>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo PROOT; ?>css/bootstrap.min.css">

		<script src="<?php echo PROOT; ?>js/jquery/jquery-3.4.1.min.js"></script>
		<script src="<?php echo PROOT; ?>js/bootstrap.bundle.min.js"></script>
		
		<link rel="stylesheet" href="<?php echo PROOT; ?>css/custom.css">
		
		<?php echo $this->content('head'); ?>
  	</head>
  	<body>
  		<?php include_once 'main_menu.php'; ?>
  		
  		<div class="container-fluid" style="min-height:calc(100% - 125px);">
  			<?php echo Session::displayMessage(); ?>
  			<?php echo $this->content('body'); ?>
  		</div>
  		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->
  	</body>
</html>