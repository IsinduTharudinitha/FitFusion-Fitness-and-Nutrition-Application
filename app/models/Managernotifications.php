<?php

// user class
class Managernotifications {
    use Model;

    protected $table = 'managernotifications';
    
    protected $allowedColumns = [
        'id',
        'manageremail',
        'nmsg',
        'nsub'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
        if(empty($data['nmsg'])) {
            $this->errors['nmsg'] = "nmsg is required";
        } 
        if(empty($data['nsub'])) {
            $this->errors['nsub'] = "nsub is required";
        } 

       
        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data) {
        $this->errors = [];
        
    }
}

// make models for each table in DB, and add the editable columns of each