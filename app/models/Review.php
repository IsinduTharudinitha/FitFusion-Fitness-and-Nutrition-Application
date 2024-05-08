<?php

// user class
class Review {
    use Model;

    protected $table = 'reviews';
    
    protected $allowedColumns = [
        'reviewid',
        'memberemail',
        'reviewtype',
        'typeemail',
        'reviewcontent',
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

  
}

// make models for each table in DB, and add the editable columns of each