<?php

// user class
class Complaint {
    use Model;

    protected $table = 'complaint';
    
    protected $allowedColumns = [
        'id',
        'memberEmail',
        'type',
        'complaint',
        'status',
        'reply'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
      
        // validate password
     
        if(empty($data['complaint'])) {
            $this->errors['id'] = "Complaint is required";
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