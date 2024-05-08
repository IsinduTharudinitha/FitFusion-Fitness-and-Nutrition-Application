<?php

// user class
class Workoutsuppliments {
    use Model;

    protected $table = 'workoutsuppliments';
    
    protected $allowedColumns = [
        'id',
        'suppliment',

    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
      
        // validate password
     
        if(empty($data['id'])) {
            $this->errors['id'] = "id is required";
        } 
        
        if(empty($data['suppliment'])) {
            $this->errors['suppliment'] = "suppliment is required";
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