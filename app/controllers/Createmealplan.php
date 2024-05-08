<?php

class Createmealplan{
    use Controller;

        public function index() {
            $data = [];

            $regnutri=new Registerednutritionist;
            $gym=new Gym;
            $regmembers=new Registeredmembers;
            $mealplans=new Mealplans;
            $fooditems=new Fooditems;

            //print_r($_POST);
            $arr1['nutritionistemail']=$_SESSION['email'];
            $nudetails=$regnutri->where($arr1);
            $memail=$nudetails[0]->manageremail;
            $arr2['manageremail']=$memail;
            $gymdetails=$gym->where($arr2);
            $gymname=$gymdetails[0]->gymName;
            $arr3['gymname']=$gymname;
            $regmemdetails=$regmembers->where($arr3);
            $count=0;
            foreach($regmemdetails as $mem){
                $data['mememail'][$count]=$mem->memberemail;
                $count++;
            }    
            $data['fooddetails']=$fooditems->findall(); 
                   

            if ($_SERVER['REQUEST_METHOD']=='POST') {

                //insert breakfast
                $breakfastcount=0;
                foreach($_POST['breakfast_name'] as $x){
                    $arr4['mealplanname']=$_POST['planname'];
                   // $arr4['day']=$_POST['day'];
                    $arr4['mealtime']="breakfast";
                    $arr4['mealitem']=$x;
                    $arr4['quantity']=$_POST['breakfast_quantity'][$breakfastcount];
                    $arr4['calories']=$_POST['breakfast_calories'][$breakfastcount];
                    $mealplans->insert($arr4);
                    $breakfastcount++;
                }

                //insert snack1
                $snack1count=0;
                foreach($_POST['snack1_name'] as $x){
                    $arr4['mealplanname']=$_POST['planname'];
                   // $arr4['day']=$_POST['day'];
                    $arr4['mealtime']="snack1";
                    $arr4['mealitem']=$x;
                    $arr4['quantity']=$_POST['snack1_quantity'][$snack1count];
                    $arr4['calories']=$_POST['snack1_calories'][$snack1count];
                    $mealplans->insert($arr4);
                    $snack1count++;
                }
                //insert lunch
                $lunchcount=0;
                foreach($_POST['lunch_name'] as $x){
                    $arr4['mealplanname']=$_POST['planname'];
                    //$arr4['day']=$_POST['day'];
                    $arr4['mealtime']="lunch";
                    $arr4['mealitem']=$x;
                    $arr4['quantity']=$_POST['lunch_quantity'][$lunchcount];
                    $arr4['calories']=$_POST['lunch_calories'][$lunchcount];
                    $mealplans->insert($arr4);
                    $lunchcount++;
                }
                //insert snack2
                $snack2count=0;
                foreach($_POST['snack2_name'] as $x){
                    $arr4['mealplanname']=$_POST['planname'];
                   // $arr4['day']=$_POST['day'];
                    $arr4['mealtime']="snack2";
                    $arr4['mealitem']=$x;
                    $arr4['quantity']=$_POST['snack2_quantity'][$snack2count];
                    $arr4['calories']=$_POST['snack2_calories'][$snack2count];
                    $mealplans->insert($arr4);
                    $snack2count++;
                }

                //insert dinner
                $dinnercount=0;
                foreach($_POST['dinner_name'] as $x){
                    $arr4['mealplanname']=$_POST['planname'];
                  //  $arr4['day']=$_POST['day'];
                    $arr4['mealtime']="dinner";
                    $arr4['mealitem']=$x;
                    $arr4['quantity']=$_POST['dinner_quantity'][$dinnercount];
                    $arr4['calories']=$_POST['dinner_calories'][$dinnercount];
                    $mealplans->insert($arr4);
                    $dinnercount++;
                }

                //$arr5['memberemail']=$_POST['mememail'];
                $arr5['mealplanname']=$_POST['planname'];
                $regmembers->update($_POST['mememail'],$arr5,'memberemail');



            }

    //print_r($data['mememail']);
            $this->view('createmealplan', $data);
        }
   

}