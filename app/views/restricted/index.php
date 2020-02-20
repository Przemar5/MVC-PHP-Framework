<?php $this->setSiteTitle('Access Restricted'); ?>
<?php $this->start('head'); ?>
<meta content="test">
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<h1 class="text-center red">You don't have permissioin to access this page.</h1>
<?php $this->end(); ?>