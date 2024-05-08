<?php

// user class
class Gymmanager {
    use Model;

    protected $table = 'gymmanager';
    
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

    public function deleteByEmail($email, $email_column = 'email') {
        $data[$email_column] = $email;
        $query = "delete from $this->table where $email_column = :$email_column ";
        
        // echo $query;
        $this->query($query, $data);

        return false;
    }
}

// make models for each table in DB, and add the editable columns of each