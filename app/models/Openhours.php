<?php

// user class
class Openhours {
    use Model;

    protected $table = 'openhours';
    
    protected $allowedColumns = [
        'gymName',
        'openhourswf',
        'openhourswt',
        'openhourssaf',
        'openhourssat',
        'openhourssuf',
        'openhourssut'
        
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

    public function validate($data){
        $this->errors = [];

        //$temp3=["openhourswf","openhourswt","openhourssaf","openhourssat","openhourssuf","openhourssut"];

        if(strtotime($data["openhourswf"])>strtotime($data["openhourswt"])){
            $this->errors['openhourswf'] = "Weekdays from time should be smaller than to time";
        }
        if(strtotime($data["openhourssaf"])>strtotime($data["openhourssat"])){
            $this->errors['openhourssaf'] = "Saturday  from time should be smaller than to time";
        }
        if(strtotime($data["openhourssuf"])>strtotime($data["openhourssut"])){
            $this->errors['openhourssuf'] = "Sunday from time should be smaller than to time";
        }
        

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function fetchGymOpenTime($gymname, $dayType) {
        $query = "select * from $this->table where gymName = :gymName";
        $data['gymName'] = $gymname;
        $result = $this->query($query, $data);
        $result = $result[0];
        return $result[$dayType];
    }

  
}

// make models for each table in DB, and add the editable columns of each