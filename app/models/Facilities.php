<?php

// user class
class Facilities {
    use Model;

    protected $table = 'facilities';
    
    protected $allowedColumns = [
        'gymName',
        'facility',
        
    ];

   

  
}

// make models for each table in DB, and add the editable columns of each