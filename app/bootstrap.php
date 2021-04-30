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
 *@author Javier Linares
 */

/**
 * I put all the requires here so I wont need to be typing them everytime.
 * They will all be load at the beginning.
 */
    // Load Config
    require_once 'config/config.php';

    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    // Autoload Core Libraries.
    spl_autoload_register(function ($className){
        require_once 'libraries/' . $className . '.php';
    });
