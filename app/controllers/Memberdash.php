<?php

class Memberdash{
    use Controller;
        public function index() {
            $data = [];

            if(isset($_SESSION['email'])){
                if($_SESSION['usertype']=="member") {
                    // redirect('memberdash');
                    // die();
                } else if($_SESSION['usertype']=="gyminstructor") {
                    redirect('gyminstructordash');
                    die();
                } else if($_SESSION['usertype']=="nutritionist") {
                    redirect('nutritionistdash');
                    die();
                } else if($_SESSION['usertype']=="gymmanager") {
                   redirect('gymmanagerdash');
                   die();
                } else if($_SESSION['usertype']=="gymowner") {
                    redirect('gymownerdash');
                    die();
                } else if($_SESSION['usertype']=="admin") {
                    redirect('admindash');
                    die();
                }
                }
            else{
                redirect("login");
            }

            
            $nutrischedule = new Nutritionistschedule;
            $arr1['memberemail'] = $_SESSION['email'];
            // print_r($arr1['email']);

            $nutrideets = $nutrischedule->first($arr1);
            if ($nutrideets) {
                $data['height'] = $nutrideets->height;
                $data['weight'] = $nutrideets->weight;
            }
            else {
                $data['height'] = "";
                $data['weight'] = "";
            }
            

            // print_r($arr1['email']);

            $instrschedule = new InstrSchedule;
            $instrdeets = $instrschedule->first($arr1);
            $data['goal'] = $instrdeets->goal;
            $data['age'] = $instrdeets->memberage;
            $data['gymemail'] = $instrdeets->gymemail;

            $user = new User;
            $arr2['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr2);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;

            $gym = new Gym;
            $arr3['email'] = $data['gymemail'];
            $gymdata = $gym->first($arr3);
            $data['gymname'] = $gymdata->gymName;

            $address = new Address;
            $arr4['gymName'] = $data['gymname'];
            $locationdata = $address->first($arr4);
            $data['location1'] = $locationdata->location1;
            $data['location2'] = $locationdata->location2;
            $data['location3'] = $locationdata->location3;

            $regmembers = new Registeredmembers;
            $arr5['memberemail'] = $_SESSION['email'];
            $memberdetails = $regmembers->where($arr5);
            $packageid = $memberdetails[0]->packageid;
            // print_r($packageid);
            $data['packageid'] = $packageid;

            $package = new Package;
            $arr6['id'] = $packageid;
            // print_r($arr2);
            $packagedetails = $package->where($arr6);
            // print_r($packagedetails);
            $packagetype = $packagedetails[0]->packagetype;
            $packagegroup = $packagedetails[0]->packagegroup;
            // print_r($packagetype);

            $data['packagetype'] = $packagetype;
            $data['packagegroup'] = $packagegroup;


            
             
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                // $data['errors'] = $user->errors;
            }

            // $regmembers = new Registeredmembers;
            // $arr['memberemail'] = $_SESSION['email'];
            // $memberdetails = $regmembers->where($arr);
            // $packageid = $memberdetails[0]->packageid;
            // // print_r($packageid);
            // $data['packageid'] = $packageid;

            // $package = new Package;
            // $arr2['id'] = $packageid;
            // // print_r($arr2);
            // $packagedetails = $package->where($arr2);
            // // print_r($packagedetails);
            // $packagetype = $packagedetails[0]->packagetype;
            // // print_r($packagetype);

            // $data['packagetype'] = $packagetype;
            
            $this->view('Member/memberdash', $data);
        }
}