## Sistema de Monitore y Propaganda Electoral

Sistema informático del TSE que permite el registro de medios de comunicación, registrar y procesar reportes de monitoreo de campaña y propaganda electoral, cargar materiales o archivos audiovisuales producidos por organizaciones políticas, realizar reportes de monitoreo, registro por cada proceso electoral, entre otros.

###Requisitos Previos
Antes de instalar el proyecto, asegúrate de tener los siguientes requisitos:

    PHP: 8.2 o superior
    Composer: 2.x
    Base de datos: MySQL/PostgreSQL
    Servidor web: Nginx
    Git

Es importante tener una base de datos ya creada con los respectivos permisos al usuario.

###Instalación
Sigue estos pasos para configurar el proyecto.
Despues de clonar el repositorio

1. Configurar el archivo .env, copia el archivo de ejemplo .env.example a .env:

        cp .env.example .env

    Abre el archivo .env y ajusta las configuraciones según el entorno

2. Instalar las dependencias del proyecto:

        composer install

3. Generar la clave de aplicación:

        php artisan key:generate

4. Migrar la base de datos y poblar con datos iniciales:

        php artisan migrate
        php artisan db:seed

5. Iniciar passport 

        php artisan passport:install

6. Crear el link simbólico para el manejo de almacenamiento de archivos

        php artisan storage:link



        


