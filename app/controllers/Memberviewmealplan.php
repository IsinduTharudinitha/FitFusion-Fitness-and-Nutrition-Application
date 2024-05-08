<?php

class Memberviewmealplan{
    use Controller;

        public function index() {
            $data = [];     

            $user = new User;
            $arr1['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr1);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;

            $regmember = new Registeredmembers;
            $mealplanname = $regmember->getMealPlanName($_SESSION['email']);
            $data['mealplanname'] = $mealplanname;
            
            if ($mealplanname) {
                $data['flag'] = 1;
                $mealplans = new Mealplans;
                $arr2['mealplanname'] = $mealplanname;
                // print_r($arr2['mealplanname']);
                $mealplandeets = $mealplans->where($arr2);
                // print_r($mealplandeets);

                $allbreakfast = [];
                $alllunch = [];
                $alldinner = [];
                $allsnack1 = [];
                $allsnack2 = [];

                

                for ($i = 0; $i < count($mealplandeets); $i++) {
                    // if mealtime is breakfast, add an array of mealitem, calories, and quantity into the allbreakfast array
                    if ($mealplandeets[$i]->mealtime == 'breakfast') {
                        array_push($allbreakfast, [$mealplandeets[$i]->mealitem, $mealplandeets[$i]->calories, $mealplandeets[$i]->quantity]);
                    }
                    // if mealtime is lunch, add an array of mealitem, calories, and quantity into the alllunch array
                    elseif ($mealplandeets[$i]->mealtime == 'lunch') {
                        array_push($alllunch, [$mealplandeets[$i]->mealitem, $mealplandeets[$i]->calories, $mealplandeets[$i]->quantity]);
                    }
                    // if mealtime is dinner, add an array of mealitem, calories, and quantity into the alldinner array)
                    elseif ($mealplandeets[$i]->mealtime == 'dinner') {
                        array_push($alldinner, [$mealplandeets[$i]->mealitem, $mealplandeets[$i]->calories, $mealplandeets[$i]->quantity]);
                    }
                    // if mealtime is snack1, add an array of mealitem, calories, and quantity into the allsnack1 array
                    elseif ($mealplandeets[$i]->mealtime =='snack1') {
                        array_push($allsnack1, [$mealplandeets[$i]->mealitem, $mealplandeets[$i]->calories, $mealplandeets[$i]->quantity]);
                    }
                    // if mealtime is snack2, add an array of mealitem, calories, and quantity into the allsnack2 array
                    elseif ($mealplandeets[$i]->mealtime =='snack2') {
                        array_push($allsnack2, [$mealplandeets[$i]->mealitem, $mealplandeets[$i]->calories, $mealplandeets[$i]->quantity]);
                    }
                }

                $data['allbreakfast'] = $allbreakfast;
                $data['alllunch'] = $alllunch;
                $data['alldinner'] = $alldinner;
                $data['allsnack1'] = $allsnack1;
                $data['allsnack2'] = $allsnack2;

            }
            else {
                $data['flag'] = 0;
            }
            
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                
                


            }

    //print_r($data['mememail']);
            $this->view('Member/memberviewmealplan', $data);
        }
   

}