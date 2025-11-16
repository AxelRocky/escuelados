# escuela2 para hacer en apache2 y no depender tanto de la IA
# hacerlo mas apegado al curso que estoy llevando
practica de un sistema mvc realizado en php 

Estructura del Proyecto

/var/www/html/escuela/
D:\WebProjects\escuela

├── app
    └── inicio.php
    └── controladores/
        └── login.php
    └── libs/
        └── control.php
        └── controlador.php
        └── mariadb.php
    └── modelos/
        └── loginmodelo.php
    └── vistas/
        └── login/
            └── caratula.php
            └── mensaje.php
            └── olvido.php
        └── encabezado.php
        └── piepagina.php
└── public/
    └── index.php
    └── css/
    └── fotos/
    └── img/
    └── js/
    └── temarios/
└── htaccess.json
        

/var/www/html/escuela/
D:\WebProjects\escuela\     ← (versión en Windows si usas Nginx en tu PC)
├── app/
│   ├── inicio.php
│   ├── controladores/
│   ├── libs/
│   │   ├── control.php
│   │   └── mariadb.php    ← Aquí vive tu clase Mariadb
│   ├── modelos/
│   └── vistas/
└── public/
    ├── index.php           ← Punto de entrada del sitio (Nginx apunta aquí)
    ├── css/
    ├── fotos/
    ├── img/
    ├── js/
    └── temarios/


version apache2

├── app
    └── inicio.php
    └── controladores/
        └── Login.php
    └── libs/
        └── Control.php
        └── Controlador.php
        └── Mariadb.php
    └── modelos/
    └── vistas/
    └── .htaccess
└── public/
    └── index.php
    └── .htaccess
└── .htaccess
        