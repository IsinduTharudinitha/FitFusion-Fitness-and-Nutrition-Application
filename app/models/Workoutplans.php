<?php

// user class
class Workoutplans {
    use Model;

    protected $table = 'workoutplans';
    
    protected $allowedColumns = [
        'id',
        'iemail',
        'maingoal',
        'workouttype',
        'traininglevel',
        'programduration',
        'daysperweek',
        'targetgender',
        'exercise',	
        'machine',
        'sets',
        'reps',
        'time',
        'rest',
        'workoutname'

        


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

        if(empty($data['maingoal'])) {
            $this->errors['maingoal'] = "maingoal are required";
        } 
         
        if(empty($data['workouttype'])) {
            $this->errors['workouttype'] = "workouttype are required";
        } 

        if(empty($data['traininglevel'])) {
            $this->errors['traininglevel'] = "traininglevel are required";
        } 

        if(empty($data['programduration'])) {
            $this->errors['programduration'] = "programduration are required";
        } 

        if(empty($data['daysperweek'])) {
            $this->errors['daysperweek'] = "daysperweek are required";
        } 


        if(empty($data['targetgender'])) {
            $this->errors['targetgender'] = "targetgender are required";
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