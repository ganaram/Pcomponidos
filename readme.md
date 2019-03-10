# PcComponidos

- [Instalación del proyecto](#Instalar)



## 

## Instalación de la web.

Se deberán seguir los siguientes pasos para poder utilizar esta aplicación.

- Descargar o clonar el proyecto desde GitHub.
- Poseer un entorno linux con laravel, valet, y sus paquetes necesarios.
- Crear un directorio para nuestro proyecto, mover todo el contenido del proyecto al mismo.
- Crear el archivo **.env**.
- **composer install** dentro de nuestro proyecto para instalar dependencias.
- Crear una base de datos, en este caso usaremos el nombre **pccomponidosdb**
- Con las credenciales de administrador de MySQL, configuramos el archico **.env** de nuestro proyecto, obteniendo acceso a la/las BD.
- Con el comando **php artisan key:generate** generamos una clave encriptada para nuestro archivo .env.
- Para crear las tablas que usaremos en nuestro proyecto, usaremos el comando **php artisan migrate**. En caso de que tengamos que crearlas de nuevo, se usará el comando **php artisan migrate:fresh**.
- **valet park** para indicar a valet donde trabajaremos, dando ya accesibilidad a la página web.
- Con el proyecto ya "desplegado", generaremos valores aleatorios en la BD con **php artisan db:seed**, como pueden ser usuarios con sus contraseñas, ordenadores genéricos, o componentes.

- Cuando se haya completado de configurar el proyecto, podremos acceder a el usando la siguiente ruta : {{nombrededirectorio}}.test.