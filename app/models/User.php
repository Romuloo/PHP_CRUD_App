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
     *This class defines the model that is going to interact with the db and is going
     * to provide data to Users.php
     */
    class User{
        private $db;

        public function __construct(){
            $this -> db = new Database;
        }

        //  Register User
        public function register($data){
            $this -> db -> query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            // Bind values
            $this -> db -> bind(':name', $data['name']);
            $this -> db -> bind(':email', $data['email']);
            $this -> db -> bind(':password', $data['password']); // the hashed password

            // Execute
            if($this -> db -> execute()){
                return true;
            } else{
                return false;
            }
        }

        // Login User
        public function login($email, $password){
            $this -> db -> query('SELECT * FROM users WHERE email = :email');
            $this -> db -> bind(':email', $email);

            $row = $this -> db -> single();

            $hashed_password = $row -> password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            } else{
                return false;
                }
        }

        // Find user by Email
        public function findUserByEmail($email){
            // I use bind to prevent malicious code that can destroy my database.
            $this -> db -> query('SELECT * FROM users WHERE email = :email');
            // Bind values
            $this -> db -> bind(':email', $email);

            $row = $this -> db -> single();

            // Check row
           if($this -> db -> rowCount()){
               return true;
           } else{
               return false;
           }
        }

        // Get User by ID
        public function getUserById($id){
            $this -> db -> query('SELECT * FROM users WHERE id = :id');
            // Bind values
            $this -> db -> bind(':id', $id);

            $row = $this -> db -> single();

            return $row;
        }
}