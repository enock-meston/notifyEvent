<?php
defined('DB_HOSTNAME') ? null : define('DB_HOSTNAME', 'localhost');
defined('DB_USERNAME') ? null : define('DB_USERNAME', 'root');
defined('DB_PASSWORD') ? null : define('DB_PASSWORD', '');
defined('DB_DATABAS') ? null : define('DB_DATABASE', 'eventdb');

$con = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Error occured while connecting to the database. Please try again later!");

defined('NOTIFY_MAIL') ? null : define('NOTIFY_MAIL','ask@nigoote.com');
defined('NOTIFY_KEY') ? null : define('NOTIFY_KEY','Enock@132'); // password here


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'notifyevent/');
defined('BASE_URL') ? null : define('BASE_URL','http://localhost:8080/notifyevent/android/'); // Base url for the project !!!!