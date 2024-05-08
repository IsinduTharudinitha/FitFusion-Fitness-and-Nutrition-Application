<?php

// user class
class Gymimages {
    use Model;

    protected $table = 'gymimages';
    
    protected $allowedColumns = [
        'manageremail',
        'image_url'
    ];

    

  
}

// make models for each table in DB, and add the editable columns of each