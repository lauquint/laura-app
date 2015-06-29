#Application

La aplicación hace un select de la base de datos apartir de un id y pinta por pantalla nombre y apellidos usuario de la base de datos.

##Virtual host

apache::vhost { ‘laura.fw':
    port    => '80',
    docroot => '/www/laura-app/web',
}

##

##Database

    $ mysql -u root
  
    mysql > create database fw_app;

    use fw_app;

    create table user (id INT NOT NULL PRIMARY KEY, name VARCHAR(100), surname VARCHAR(100));

##Acceso

    Acceder a http://laura.fw