Tutorial para hacer todo el pedo del Horacio.

1	htdocs si tienen xampp / www si tienen wampp

2 	Clonar el repositorio en su carpeta htdocs o www.
3 	Instalar composer.
3.1 	Instalar workbench.
4	Crear servidores virtuales para CLIENT y para la API.
5	Cargar base de datos. 

7	Cualquier duda preguntar a Mauricio de 4:30 pm a 8:pm

8	Buscar el archivo .env.example en CLIENT y en API y copiar lo que lleva dentro.
8.1	Dar click derecho sobre el archivo y dar en 'new' -> 'file' -> le colocan por nombre >> .env << y dentro del archivo colocan lo que copiaron de .env.example.
9	Modificar de la siguiente en API forma:

	APP_ENV=local
	APP_KEY=
	APP_DEBUG=true
	APP_LOG_LEVEL=debug
	APP_URL=http://localhost

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=serviciosescolares
	DB_USERNAME=root
	DB_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	SESSION_DRIVER=file
	QUEUE_DRIVER=sync

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_DRIVER=smtp
	MAIL_HOST=mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null

	PUSHER_APP_ID=
	PUSHER_KEY=
	PUSHER_SECRET=


10	Modificar de la siguiente en CLIENT forma:

	APP_ENV=local
	APP_KEY=
	APP_DEBUG=true
	APP_LOG_LEVEL=debug
	APP_URL=http://localhost

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=serviciosescolares
	DB_USERNAME=root
	DB_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	SESSION_DRIVER=file
	QUEUE_DRIVER=sync

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_DRIVER=smtp
	MAIL_HOST=mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null

	PUSHER_APP_ID=
	PUSHER_KEY=
	PUSHER_SECRET=

	SERVER_API=http://'NOMBRE DE TU VHOST'.dev


11.1	Desde la terminal y dentro de CLIENT y API ejecutar lo siguiente:
	composer update
11.2	Abrir proyecto CLIENT.
11.3	Buscar Vendor/Illuminate/HTMLServiceProvider.php
11.4	Find - Replace / singleton - singleton
11.5	Guardar.
12	Esto se hace tanto en CLIENT como en API
	php artisan key:generate
<<<<<<< HEAD

	"composer key:generate"
	"composer config:clear"
=======
	php artisan config:clear
<<<<<<< HEAD:tutorial.txt
13	Con esto ya deber�a poder entrar utilizando su direcci�n de VHOST en su navegador por ejemplo: serviciosmivhost.dev y entra al login, para probar que todo est� bien deber�an poder loggearse utilizando lo siguiente, user: Horacio, pass: horacio123x
=======
>>>>>>> 6859cdca39b6a09a09d4ec50ef1cc62b77299b72
13	Con esto ya deber�a poder entrar utilizando su direcci�n de VHOST en su navegador por ejemplo: serviciosmivhost.dev y entra al login, para probar que todo est� bien deber�an poder loggearse utilizando lo siguiente, user: Horacio, pass: horacio123x
>>>>>>> 9ad29d3757cf99a17d4276924642f38ada980a67:README.md

14 Cualquier cosa, antes de perder el control, apagar y encender su wampp o xampp.

