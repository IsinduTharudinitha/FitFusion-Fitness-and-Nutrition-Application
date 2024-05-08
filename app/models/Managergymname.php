<?php

// user class
class Managergymname{
    use Model;

    protected $table = 'managergymname';

    protected $allowedColumns = [
        'id',
        'manageremail',
        'gymemail',
        
    ];

//     public function validate($data)
//     {
//         $this->errors = [];

//         // validate email

//         // validate password
//         if (empty($data['packagetype'])) {
//             $this->errors['id'] = "Package type is required";
//         }
//         if (empty($data['description'])) {
//             $this->errors['id'] = "Description is required";
//         }
//         if (empty($data['paymentperiod'])) {
//             $this->errors['id'] = "Payment period is required";
//         }
//         if (empty($data['amount'])) {
//             $this->errors['id'] = "Amount is required";
//         }

//         if (empty($this->errors)) {
//             return true;
//         }
//         return false;
//     }

//     public function unique($data)
//     {

//         $this->errors = [];
//         $arr['id'] = $data['id'];
//         //check unique email
//         $unique = $this->first($arr);
//         if (!empty($unique)) {
//             $this->errors['id'] = "ID is already in use";
//         }



//         if (empty($this->errors)) {
//             return true;
//         }
//         return false;
//     }
}

// make models for each table in DB, and add the editable columns of each