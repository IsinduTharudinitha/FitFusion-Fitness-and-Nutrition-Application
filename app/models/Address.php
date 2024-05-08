<?php

// user class
class Address {
    use Model;

    protected $table = 'address';
    
    protected $allowedColumns = [
        'gymName',
        'location1',
        'location2',
        'location3'
        
    ];

    public function unique($data) {
        $this->errors = [];
        $arr['gymName'] = $data['gymName'];
        
        //check unique email
        $unique = $this->first($arr);
        if(!empty($unique)) {
            $this->errors['gymName'] = "Gym Name is already in use";
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

  
}

// make models for each table in DB, and add the editable columns of each