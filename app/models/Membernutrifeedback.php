<?php

// user class
class Membernutrifeedback {
    use Model;

    protected $table = 'membernutrifeedback';
    
    protected $allowedColumns = [
        'id',
        'name',
        'email',
        'nutritionistemail',
        'feedback',
        
        
       
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
      
        // validate password
     
        if(empty($data['id'])) {
            $this->errors['id'] = "id is required";
        } 
        
        if(empty($data['day'])) {
            $this->errors['day'] = "day is required";
        } 

        if(empty($data['exercise'])) {
            $this->errors['exercise'] = "exercise are required";
        } 
         
        if(empty($data['sets'])) {
            $this->errors['sets'] = "sets are required";
        } 

        if(empty($data['reps'])) {
            $this->errors['reps'] = "reps are required";
        } 

        if(empty($data['rest'])) {
            $this->errors['rest'] = "rest are required";
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