<?php

// user class
class Schedule {
    use Model;

    protected $table = 'schedule';
    
    protected $allowedColumns = [
        'id',
        'date',
        'startingtime',
        'machine',
        'gymemail',
        'memberemail',
        'status'
        
    ];

    public function unique($data) {
        $this->errors = [];
        
        if(!empty($unique)) {
        
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function fetchMachineSchedule($machine,$gymemail,$date) {
        $arr['machine'] = $machine;
        $arr['gymemail'] = $gymemail;
        $arr['date'] = $date;
        $result = $this->where($arr);

        //get the starting times of the rows taken by $result to an array and return that array
        $startingtimes = [];
        foreach($result as $row) {
            $startingtimes[] = $row->startingtime;
        }
        return $startingtimes;

    }
  
}

// make models for each table in DB, and add the editable columns of each