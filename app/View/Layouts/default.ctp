<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>Ubi Test</title>
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('uikit.almost-flat.min');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>

	<body>
	<nav id="mainMenu" class="uk-navbar">
		<a href="/" class="uk-navbar-brand">Ubi Test</a>
	</nav>

	<?php echo $this->Flash->render(); ?>

	<div class="uk-grid uk-container uk-container-center uk-margin-top">
		<?php echo $this->fetch('content'); ?>
	</div>
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/uikit.min.js') }}"></script>
	<script src="{{ asset('js/components/datepicker.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	</body>
</html>
