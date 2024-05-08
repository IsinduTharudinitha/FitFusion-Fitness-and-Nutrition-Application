<?php

// user class
class Machinefailure {
    use Model;

    protected $table = 'machinefailure';
    
    protected $allowedColumns = [
        'id',
        'notes',
        'failure'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
      
        // validate password
     
        if(empty($data['id'])) {
            $this->errors['id'] = "id is required";
        } 
        
        if(empty($data['failure'])) {
            $this->errors['failure'] = "failure is required";
        } 

        if(empty($data['notes'])) {
            $this->errors['notes'] = "notes are required";
        } 


        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data) {
        
        $this->errors = [];
        $arr['id'] = $data['id'];
       
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