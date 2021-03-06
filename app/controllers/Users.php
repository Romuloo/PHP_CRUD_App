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
 * This class manages users. Controls the user registration and login.
 */
    class Users extends Controller {

        /**
         * Users constructor.
         */
        public function __construct(){
            $this -> userModel = $this->model('User');
        }

        /**
         * This method allows the user to register himself.
         */
        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else{
                    // Check email
                    if($this -> userModel -> findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password'] < 6)){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                } else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['email_err']) &&  empty($data['name_err']) && empty($data['password_err'])
                            && empty($data['confirm_password_err'])){
                // Validated

                // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // I reset the password to
                                                                                                 // a hash.

                // Register User and sends a mail
                    if($this -> userModel -> register($data)){
                        flash('register_success' , 'You are registered and can log in');
                        mail($data['email'], SUBJECT, MESSAGE, HEADERS);
                        redirect('users/login');


                    } else{
                        die('Something went wrong');
                    }

                }else{
                    // Load view with errors
                    $this -> view('users/register', $data);
                }

            } else{
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                 ];
                // Load view
                $this -> view('users/register', $data);

            }
        }

        /**
         * This method allows the user to log into the page with his credentials.
         */
        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user and email
                if($this -> userModel -> findUserByEmail($data['email'])){
                    // User found
                }
                else{
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty
                if(empty($data['email_err'])  && empty($data['password_err'])){
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this -> userModel -> login($data['email'], $data['password']);

                    if($loggedInUser){
                        // Create Session variables
                        $this -> createUserSession($loggedInUser);
                    } else { // Rerender the form with an error
                        $data['password_err'] = 'Password incorrect';

                        $this -> view('users/login' , $data);
                    }
                } else{
                    // Load view with errors
                    $this -> view('users/login', $data);
                }

            } else{
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this -> view('users/login', $data);
            }
        }


        /**
         * Sets the user values to sessions
         * @param $user
         */
        public function createUserSession($user){
            // I'm setting the user_id, user_email and user_name into a session variable.
            $_SESSION['user_id'] = $user -> id;
            $_SESSION['user_email'] = $user -> email;
            $_SESSION['user_name'] = $user -> name;
            redirect('posts'); // Once I log in I get redirected to index
        }

        /**
         * Allos the User to log out.
         */
        // Delete all session variables that I've created before
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

    }