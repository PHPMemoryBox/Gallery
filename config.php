<?php

define('APP_ROOT', '/gallery');

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');

define('DB_HOST', 'localhost');
define('DB_USER', 'admin');
define('DB_PASS', '1234');
define('DB_NAME', 'gallery');

define('CWD', getcwd());
define('CONTENT', '/content/');
define('PHOTOS_PATH', CONTENT . 'photos/');
define('THUMBNAILS_PATH', PHOTOS_PATH . 'thumbnails/');


define('MAIL_HOST', "smtp.gmail.com");
define('MAIL_PORT', "587");
define('MAIL_AUTH', "true");
define('MAIL_SECURE', "tls");
define('MAIL_USERNAME', "gallery.memorybox");
define('MAIL_PASSWORD', "gabitsveti");
define('MAIL_FROM', "Memory Box Gallery");
define('MAIL_FROMNAME', "Memory Box Gallery");
