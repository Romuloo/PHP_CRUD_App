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
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */

    class Database
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh; // Database handeler.
        private $stmt;
        private $error;

        public function __construct(){
            // Set DNS
            $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );


            // Create PDO instance
            try {
                $this->dbh = new PDO($dns, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with query
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null){
            if (is_null($type)) {
                switch (true) {                      // Runs if $type is null.
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
    public function execute(){
        return $this -> stmt -> execute();
    }

        // Get result set as array of objects
        public function resultSet(){
            $this -> execute();
            return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
        }

        // Get single record as object
        public function single(){
            $this -> execute();
            return $this -> stmt -> fetch(PDO::FETCH_OBJ);
        }

        // Get row count
        public function rowCount(){
            return $this -> stmt -> rowCount();
        }
}



