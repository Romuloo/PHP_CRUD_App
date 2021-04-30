<?php
/**
Copyright [2021] [Javier Linares Castrillón]
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
http://www.apache.org/licenses/LICENSE-2.0
Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
 */
/**
 * @author Javier Linares
 */
/**
 * Defines constants that I use to refer the app root, url root or site name.
 */

    //  DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'erasmusapp');

    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));

    // URL Root
    define('URLROOT', 'http://localhost/erasmusApp');
    // Site Name
    define('SITENAME', 'Erasmus - Dundalk');

    // Email stuff
    define('SUBJECT', 'Registration completed');
    define('MESSAGE', 'You have registered in the erasmus app.');
    define('HEADERS', 'From: D00234578@student.dkit.ie');




