<?php

class Nutritionistviewmealplan{
    use Controller;

        public function index() {
            $data = []; 
            $regmems=new Registeredmembers;
            $mealplans=new Mealplans;  
            $allmembers=$regmems->findall();
            $count=0;
            foreach($allmembers as $mem){
                $data['members'][$count]=$mem->memberemail;
                $count++;
            }
            //print_r($data['members']);

            
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                
                $arr1['memberemail']=$_POST['email'];
                $member=$regmems->where($arr1);
                $mealplanname=$member[0]->mealplanname;
                $arr2['mealplanname']=$mealplanname;
                //$arr2['day']=$_POST['day'];
                $mealplandetails=$mealplans->where($arr2);
                //print_r($mealplandetails);
                $data['mealplandetails']=$mealplandetails; 
                


            }

    //print_r($data['mememail']);
            $this->view('nutritionistviewmealplan', $data);
        }
   

}