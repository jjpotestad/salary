# Sistema de control de salarial
### Se utilizaron las siguientes tecnologías:
 - IDE: Visual Studio Code
 - Lenguaje y framework: php v7.4 y Laravel v8
 - Arquitectura: MVC

### Pasos para el despliegue del sitio:
  - Clonar el repositorio y crear el archivo **.env** copiando el archivo **.env.example**
  - Crear una BD en MySQL con el nombre de **salarydb**
  - Ejecutar en la consola **composer update** para instalar las dependencias
  - Ejecutar en la consola **php artisan migrate:fresh --seed** para insertar datos de prueba a la BD
  - Acceder al login de sitio usando el email **julio.potestad@gmail.com** y el password **admin*123**