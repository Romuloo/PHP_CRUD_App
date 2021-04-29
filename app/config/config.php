<?php
/**
 * Defines constants that I use to refer the app root, url root or site name.
 */

    //  DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'tmvc'); // This values can change depending what do I want to use.

    // App Root
    define('APPROOT', dirname(dirname(__FILE__))); //give us the app root (dirname() == "cd").

    // URL Root
    define('URLROOT', 'http://localhost/traversymvc'); // your url

    // Site Name
    define('SITENAME', 'TraversyMVC');  //your siteName


