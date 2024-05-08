<?php

// user class
class Instructorqualification {
    use Model;

    protected $table = 'instructorqualification';
    
    protected $allowedColumns = [
        'id',
        'iemail',
        'folderpath',
        'filename',
        'timestamp'
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
        if(empty($data['folderpath'])) {
            $this->errors['folderpath'] = "folderpath is required";
        } 
        if(empty($data['filename'])) {
            $this->errors['filename'] = "filename is required";
        } 
        if(empty($data['timestamp'])) {
            $this->errors['timestamp'] = "timestamp is required";
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