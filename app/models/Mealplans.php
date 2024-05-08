<?php

// user class
class Mealplans
{
    use Model;

    protected $table = 'mealplans';

    protected $allowedColumns = [
        'id',
        'mealplanname',
        'mealtime',
        'mealitem',
        'calories',
        'quantity'
    ];

    public function validate($data)
    {
        $this->errors = [];

        // validate email

        // validate password
      
        return false;
    }

    public function unique($data)
    {

        $this->errors = [];
        $arr['mealplanname'] = $data['mealplanname'];
        $arr['mealtime'] = $data['mealtime'];
        $arr['mealitem'] = $data['mealitem'];
       
        $unique=$this->where($arr);
        if (!empty($unique)){
            $this->errors['id'] = "Same food item in a mealtime";
        }
        //check unique email
        //$unique1 = $this->first($arr1);
        // if (!empty($unique1)) {
        //     $arr2['mealtime'] = $data['mealtime'];
        //     $unique2 = $this->first($arr2);
        //     if(!empty($unique2)){
        //         $arr['mealitem'] = $data['mealitem'];
        //         $unique3 = $this->first($arr3);
        //         if(!empty($unique3)){
        //             $this->errors['id'] = "ID is already in use";
        //         }
        //     }
           
        // }



        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each