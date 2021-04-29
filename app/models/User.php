<?php
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

        // Find user by email
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

}