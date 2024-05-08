<?php

// user class
class Machine {
    use Model;

    protected $table = 'machines';
    
    protected $allowedColumns = [
        'id',
        'machineType',
        'price',
        'warranty',
        'adjustability',
        'manageremail',
        'maxtime'

    ];
    //$errors = [];
    public function validate($data) {
        $errors=[];
        // validate email
      
        // validate password
        if(empty($data['id'])) {
            $this->errors['id'] = "Id is required";
        } 
        if(empty($data['machineType'])) {
            $this->errors['machineType'] = "Machine type is required";
        } 
        if(empty($data['price'])) {
            $this->errors['price'] = "Price is required";
        } 
        else{
            if((int)$data['price']<0){
                $this->errors['price'] = "Price should be  positive number";
            }
        }
        if(empty($data['warranty'])) {
            $this->errors['warranty'] = "Warranty is required";
        } 
        else{
            if((int)$data['warranty']<0){
                $this->errors['warranty'] = "warranty should be  positive number";
            }
        }

 

        if(empty($this->errors)) {
            return true;
        }
        //print_r($this->errors);
        return false;
    }

    public function unique($data) {
        
        $this->errors = [];
        $arr['id'] = $data['id'];
        //check unique email
        $unique = $this->first($arr);
        if(!empty($unique)) {
            $this->errors['id'] = "ID is already in use";
        } 

        
        if(empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each