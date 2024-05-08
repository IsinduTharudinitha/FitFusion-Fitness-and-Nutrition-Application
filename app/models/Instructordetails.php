<?php

// user class
class Instructordetails {
    use Model;

    protected $table = 'instructordetails';
    
    protected $allowedColumns = [
        'id',
        'name',
        'birthdate',
        'gender',
        'iemail',
        'experience',
        'registered',
        'memail',
        'imageurl'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
      
        // validate password
     
        if(empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        } 
        if(empty($data['birthdate'])) {
            $this->errors['birthdate'] = "birthdate is required";
        } 
        if(empty($data['gender'])) {
            $this->errors['gender'] = "gender is required";
        } 
        if(empty($data['iemail'])) {
            $this->errors['iemail'] = "iemail is required";
        } 
        if(empty($data['registered'])) {
            $this->errors['registered'] = "registered is required";
        } 
        if(empty($data['memail'])) {
            $this->errors['memail'] = "memail is required";
        } 
        if(empty($data['imageurl'])) {
            $this->errors['imageurl'] = "imageurl is required";
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