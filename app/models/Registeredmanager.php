<?php

// user class
class Registeredmanager
{
    use Model;

    protected $table = 'registeredmanager';

    protected $allowedColumns = [
        'id',
        'gymname',
        'gymemail',
        'managername',
        'manageremail',
        'gymaddress',
        'businesslicense',
        'registered'

    ];

    public function validate($data)
    {
        $this->errors = [];

        // validate email

        // validate password
        if (empty($data['gymname'])) {
            $this->errors['gymname'] = "gymname is required";
        }
        if (empty($data['gymemail'])) {
            $this->errors['gymemail'] = "gymemail is required";
        }    if (empty($data['managername'])) {
            $this->errors['managername'] = "managername is required";
        }    if (empty($data['manageremail'])) {
            $this->errors['manageremail'] = "manageremail is required";
        }    if (empty($data['gymaddress'])) {
            $this->errors['gymaddress'] = "gymaddress is required";
        }    if (empty($data['businesslicense'])) {
            $this->errors['businesslicense'] = "businesslicense is required";
        }
      

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data)
    {

        $this->errors = [];
        $arr['manageremail'] = $data['manageremail'];
        //check unique email
        $unique = $this->first($arr);
        if (!empty($unique)) {
            $this->errors['manageremail'] = "You have already applied";
        }



        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}

