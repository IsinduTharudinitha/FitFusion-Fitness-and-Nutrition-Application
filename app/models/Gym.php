<?php

// user class
class Gym {
    use Model;

    protected $table = 'gyms';
    
    protected $allowedColumns = [
        'id',
        'gymName',
        'description',
        'email',
        'manageremail'
    ];

    public function validate($data) {
        $this->errors = [];

        // validate gym name
        if(empty($data['gymName'])) {
            $this->errors['name'] = "A gym name is required";
        }

        // validate description
        if(empty($data['description'])) {
            $this->errors['description'] = "A description for your gym is required";
        }



        // validate email
        if(empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } else {
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "Email is not valid";
            }
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

        $arr1['gymName'] = $data['gymName'];
        
        //check unique gymName
        $unique = $this->first($arr1);
        if(!empty($unique)) {
            $this->errors['gymName'] = "Gym Name is already in use";
        }

        $arr2['manageremail'] = $data['manageremail'];
        
        //check unique gymName
        $unique = $this->first($arr2);
        if(!empty($unique)) {
            $this->errors['manageremail'] = "Manager email is already in use";
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each