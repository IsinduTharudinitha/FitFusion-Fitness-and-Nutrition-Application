<?php

// user class
class Instructorbanckaccount {
    use Model;

    protected $table = 'instructorbankaccount';
    
    protected $allowedColumns = [
        'id',
        'iemail',
        'banckname',
        'accno'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
      
        // validate password
     
        if(empty($data['id'])) {
            $this->errors['id'] = "id is required";
        } 
        if(empty($data['iemail'])) {
            $this->errors['iemail'] = "iemail is required";
        } 
        if(empty($data['banckname'])) {
            $this->errors['banckname'] = "banckname is required";
        } 
        if(empty($data['accno'])) {
            $this->errors['accno'] = "accno is required";
        } 
        
        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data) {
        
        $this->errors = [];
        $arr['id'] = $data['id'];
        //check unique email
        $unique = $this->first($arr);
        if(!empty($unique)) {
            $this->errors['id'] = "ID is already in use";
        } 

          

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each