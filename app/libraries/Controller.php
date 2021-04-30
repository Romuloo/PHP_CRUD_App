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
 * Base Controller
 * Loads the models and views
 */

    class Controller
    {
        // Load model
        public function model($model){
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // Instatiate model
            return new $model();
        }

        // Load view
        public function view($view, $data = []){
            // Check for the view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }else{
                // View does not exist
                die('View does not exist');
            }


        }

    }