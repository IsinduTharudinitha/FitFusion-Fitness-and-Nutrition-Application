<?php

// user class
class Package
{
    use Model;

    protected $table = 'packages';

    protected $allowedColumns = [
        'manageremail',
        'packagetype',
        'description',
        'paymentperiod',
        'amount',
        'packagegroup'
    ];

    public function validate($data)
    {
        $this->errors = [];

        // validate email

        // validate password
        if (empty($data['packagetype'])) {
            $this->errors['packagetype'] = "Package type is required";
        }
        if (empty($data['description'])) {
            $this->errors['description'] = "Description is required";
        }

        if (empty($data['paymentperiod'])) {
            $this->errors['paymentperiod'] = "Payment period is required";
        
        }
        else{
            if(!is_int((int)$data['paymentperiod'])){
                $this->errors['paymentperiod'] = "Payment period Should be a number";
            }
            elseif((int)$data['paymentperiod']>12 or (int)$data['paymentperiod']<1){
                $this->errors['paymentperiod'] = "Payment period Should be a number between 1 and 12";
            }
            else{
                /////////////valid
            }
        }
        if (empty($data['amount'])) {
            $this->errors['amount'] = "Amount is required";
        }
        else{
            if(!is_int((int)$data['amount'])){
                $this->errors['amount'] = "Amount Should be a number";
            }
            elseif((int)$data['amount']<0){
                $this->errors['amount'] = "Amount Should be a positive number";
            }
            else{
                /////////////valid
            }

        }
        if (empty($data['packagegroup'])) {
            $this->errors['packagegroup'] = "Package Group is required";
        }

        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function unique($data)
    {

        $this->errors = [];
        $arr['packagetype'] = $data['packagetype'];
        //check unique email
        $unique = $this->first($arr);
        if (!empty($unique)) {
            $this->errors['id'] = "Package Type is already in use";
        }



        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}

// make models for each table in DB, and add the editable columns of each