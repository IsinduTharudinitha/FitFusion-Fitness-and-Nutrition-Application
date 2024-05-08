<?php

// user class
class Otp
{
    use Model;

    protected $table = 'otp';

    protected $allowedColumns = [
        'id',
        'name',
        'lastname',
        'email',
        'password',
        'usertype',
        'otpcode'
    ];

    public function validate($data)
    {
        $this->errors = [];

        // validate email

        // validate password
        if (empty($data[''])) {
            $this->errors[''] = "";
        }
       
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data)
    {

        $this->errors = [];
        $arr['email'] = $data['email'];
        //check unique email
        $unique = $this->first($arr);
        if (!empty($unique)) {
            $this->errors['id'] = "Email is already in use";
        }



        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each