<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // DB config
    define('DBNAME', 'fitfusion1');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://localhost/FitFusion/public');
    // define('ROOT', 'http://localhost'); //dinu
} else {
    // DB config
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    // When the website is online
    define('ROOT', 'https://www.fitfusion.com');
}

define('APP_NAME', "FitFusion");
define('APP_DESC', "Fitness and Nutrition Application");

// truw means show errors
define('DEBUG', true);