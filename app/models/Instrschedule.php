<?php

// user class
class InstrSchedule {
    use Model;

    protected $table = 'instrschedule';
    
    protected $allowedColumns = [
        'instructoremail',
        'gymemail',
        'date',
        'timeslot',
        'memberemail',
        'membername',
        'memberage',
        'goal',
        'illness',
        'status'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate email
        if(empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } else {
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "Email is not valid";
            }
        }

        // validate password
        if(empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        } 

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data) {
        $this->errors = [];
        $arr['email'] = $data['email'];
        //check unique email
        // echo $data[2];
        $unique = $this->first($arr);
        if(!empty($unique)) {
            $this->errors['email'] = "Email is already in use";
        } 

        //check unique username
        $unique = $this->first($arr);
        if(!empty($unique)) {
            $this->errors['username'] = "Username is already in use";
        }    

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each