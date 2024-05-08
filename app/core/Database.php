<?php

// A trait cannot be used unless its inside another class
Trait Database {
    private function connect() {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME; //;dbname=my_db ADD THIS LATER WITH DB NAME
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    // Running queries
    public function query($query, $data = []){
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
        
    }

    public function get_row($query, $data = []){
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
        
    }
}