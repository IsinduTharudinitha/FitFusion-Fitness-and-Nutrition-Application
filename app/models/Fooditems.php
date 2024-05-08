<?php

// user class
class Fooditems
{
    use Model;

    protected $table = 'fooditems';

    protected $allowedColumns = [
        'id',
        'fooditem',
        'calories',
    ];

    public function validate($data)
    {
        $this->errors = [];
        if(isset($data['item_name'])){
            $count=0;
            foreach($data['item_name'] as $item){
                if((int)$data['calories'][$count]<0){
                    $this->errors['calories'] = "Calory shold be a positive number";
                    break;
                }
                $count++;
            }
        }
        else{
            $this->errors['item_name'] = "Item name is required";
        }
        if (empty($this->errors)) {
            return true;
        }

      
        return false;
    }

    public function unique($data)
    {

        $this->errors = [];
        $arr['fooditem'] = $data['fooditem'];
        //check unique email
        $unique = $this->first($arr);
        if (!empty($unique)) {
            $this->errors['fooditem'] = "Fooditem is already in use";
        }



        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each