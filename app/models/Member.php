<?php

// user class
class Member {
    use Model;

    protected $table = 'member';
    
    protected $allowedColumns = [
        'name',
        'username',
        'email',
        'password'
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
        } else if(strlen($data['password'])<6) {
            $this->errors['password'] = "Password must be at least 6 characters long";
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