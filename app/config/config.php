<?php
/**
 * Defines constants that I use to refer the app root, url root or site name.
 */

    //  DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'shareposts'); // This values can change depending what do I want to use.

    // App Root
    define('APPROOT', dirname(dirname(__FILE__))); //give us the app root (dirname() == "cd").

    // URL Root
    define('URLROOT', 'http://localhost/shareposts'); // your url

    // Site Name
    define('SITENAME', 'SharePosts');  //your siteName

    // App Version
    define('APPVERSION', '1.0.0');

