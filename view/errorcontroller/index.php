<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php require 'view/header.php'; ?>
	<div id="main">
		<h1 class="center error">
		<?php 
			echo $this->mensaje;
		?>	
		</h1>
	</div>

	<?php require 'view/footer.php'; ?>
</body>
</html>