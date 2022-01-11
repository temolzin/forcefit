<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php require 'view/header.php'; ?>
	<div id="main">
		<h1 class="center">
			VISTA APARTADO NUEVO
		</h1>
        <form action="<?php echo constant('URL')?>nuevo/registrarComputadora" method="post">
            <p>
                <label for="matricula">Matrícula</label><br>
                <input type="text" name="matricula" id="matricula" required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="nombre" required>
            </p>
            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="apellido" required>
            </p>
            <p>
                <input type="submit" value="Registrar Computadora">
            </p>
        </form>
	</div>

	<?php require 'view/footer.php'; ?>
</body>
</html>
