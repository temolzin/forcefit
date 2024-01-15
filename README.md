## Bienvedido al repositorio de forcefit 🏋️‍
![](https://github.com/temolzin/forcefit/blob/master/public/img/forcefit.png)

## Forcefit
Sistema para la administración y gestón de gimnasios, que ayuda al gimnasio a tener un control de usuario y de esta manera ofrecer servicios de alta calidad y una mejor experiencia a los usuarios.

## Preview
![](https://github.com/temolzin/forcefit/blob/master/public/img/preview1.png)
![](https://github.com/temolzin/forcefit/blob/master/public/img/preview2.png)

### requisitos previos a la instalacion📋
Para ejecutar este proyecto necesitas.

- Servidor PHP(xampp, wamp, lamp)
- Editor de texto **Visual Studio Code** (opcional)

### Instalalación de manera Local🔧💻
- En **GitHub.com**, ir a la página principal del repositorio forcefit  [Link](https://github.com/temolzin/forcefit/).
-  En la lista de la parte superior selecciona **code** [Clonar repositorio](https://github.com/temolzin/forcefit/)
- Para clonar el repositorio copeas el link.
- Abres la consola y selecciona la ubicación donde se clonara y ejecutas el siguiente comando.
``
git clone https://github.com/temolzin/forcefit.git
``
- Después lo abres en tu editor de texto preferido.
- Desactivarás la extencion ;extension=gd que se encuentra en el archivo php.ini
- Para ejecutarlo inicializas el servidor, si tienes **xampp** activas apache y MySQL
- Ejecutas **composer update**

- Después ejecutas el siguiente comando **cp .env.example .env**
- Para la instalación de la Base de Datos crearás una base de datos con el nombre que aparece en el archivo .env

- Después descargas las migraciones y los seeder

### Descargar Migraciones
- Ejecuta este comando **composer phinx-migrate** Para descargar las migraciones
### Descargar seeders
- Ejecuta el siguiente comando **composer phinx-seed-run** Para descargar los seders

- Si quieres agregar mas seders o actualizar puedes editar el Scrips que se encuentra en composer.json para que se ejecute el seder que creaste o actualizaste.
- En el archivo composer.json se encuentran los scrips para las migraciones.
- Estos son link para mayor información [Link](https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method/).
[Link](https://book.cakephp.org/phinx/0/en/seeding.html/).

## Instalar proyecto con docker
Lo primero es tener instalado docker correctamente.

## Instalar Kool Para Windows
Para ejecutar correctamente el proyecto correctamente se necesita tener instalado kool, descarga el archivo .exe para poder instalarlo en windows

[Link](https://github.com/kool-dev/kool/releases/download/2.2.0/kool-install.exe)

## Instalar Kool Para Linux
Ejecuta el siguiente comando
- curl -fsSL https://kool.dev/install | bash
Este comando solo sirve en linux, por lo que para usarse en windows necesitamos instalar Windows Subsistem Linux(WSL) e instalar una versión de Linux, además tenemos que tener Docker instalado en nuestro subsistema de linux y docker compose.

## kool run setup

Despues debemos ejecutar los siguientes comandos los cuales nos configurarán las credenciales e instalará las dependencias que necesita la aplicación.

## kool run db-reset

Para finalizar necesitamos ejecutar las migraciones con el siguiente comando, el cual podemos ejecutar cuantas veces querramos resetear la base de datos.

## kool start

Enciende el contenedor

## kool stop

Apaga el contenedor