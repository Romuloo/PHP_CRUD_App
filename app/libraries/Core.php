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
     * App Core Class
     * Creates URL $ loads core controller
     * URL FORMAT - /controller/method/params
     */
    class Core
    {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];   // <--- Array


        public function __construct(){
           // print_r($this -> getUrl());
            $url = $this -> getUrl();
            // Look in controllers for first value
            if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
            }
            // Require the controller
            require_once '../app/controllers/' . $this -> currentController . '.php';

            // Instantiate controller class
            $this -> currentController = new $this -> currentController;

            // Check for second part of url
            if(isset($url[1])){
                // Check to see if method exists in controller
                if(method_exists($this -> currentController, $url[1])){
                    $this -> currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            }

            // Get params
            $this -> params = $url ? array_values($url) : [];

            // Call a callback with array of params.
            call_user_func_array([$this -> currentController, $this -> currentMethod], $this -> params);
        }


        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }

    }