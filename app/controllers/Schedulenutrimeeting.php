<?php

class Schedulenutrimeeting{
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

            $regmembers = new Registeredmembers;
            $arr['memberemail'] = $_SESSION['email'];
            $memberdetails = $regmembers->where($arr);
            $gymemail = $memberdetails[0]->gymemail;
            $data['gymemail'] = $gymemail;

            $regnutritionists = new Registerednutritionist;
            // print_r($reginstructors);
            $arr2['gymemail'] = $gymemail;
            // print_r('gymemail'.$arr2['gymemail']);
            $nutritionistdetails = $regnutritionists->where($arr2); // array of details are here

            // echo $instructordetails;
            // echo "hiiiii";
            // $instructoremails = [];
            $nutrinamelist = [];
            if($nutritionistdetails) {
                for ($i=0; $i < count($nutritionistdetails); $i++) { 

                    $nutritionistemails = $nutritionistdetails[$i]->nutritionistemail;
                    // print_r($instructoremails);
                    $data['nutritionistemail'] = $nutritionistemails;
                    // print_r($data['instructoremail']);

                    $nutritionists = new User;
                    // print_r($instructors);
                    $arr3['email'] = $nutritionistemails;
                    // print_r($arr3['email']);
                    $nutridetails = $nutritionists->where($arr3);
                    $nutrinames = $nutridetails[0]->name;
                    // print_r($instrnames);
                    // print_r($instrdetails);
                    // print_r($instructors->where($arr3));
                    array_push($nutrinamelist, $nutrinames);
                }
            }
                

            $data['nutritionistlist'] = $nutrinamelist;

            // print_r($instrnamelist);
            // print_r($data['instructorlist']);

            // SEND THE TIMESLOTS USING AJAX
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                // print_r($_POST);


                // INSERTING DATA INTO THE DB PROCESS

                // print_r($_POST['InstrName']);

                $nutritionistname = $_POST['NutriName'];

                $nutritionist = new User;
                // print_r($instructor);
                $nutrideets['name'] = $nutritionistname;
                // print_r($arr3['email']);
                $nutridetails = $nutritionist->where($nutrideets);
                $nutritionistemail = $nutridetails[0]->email; /////////////////
                // print_r('instremail'.$nutritionistemail);

                // print_r($_POST);
                $date = $_POST['date'];////////////////
                // $timeslot = $_POST['timeslot'];////////////////////


                if (!empty($_POST['timeslot'])) {
                    $timeslot = $_POST['timeslot'];
                    // process your data here
                }

                $memberemail = $_SESSION['email'];//////////

                $membername = $_POST['membername'];
                $memberage = $_POST['memberage'];
                $height = $_POST['height'];
                $weight = $_POST['weight'];
                $allergies = $_POST['allergies'];

                $status = "Pending";

                // print_r($status);
                // print_r($gymemail);
                //add all the needed stuff and insert to the DB
                $resArray = [
                    "nutritionistemail" => $nutritionistemail,
                    "gymemail" => $gymemail,
                    "date" => $date,
                    "timeslot" => $timeslot,
                    "memberemail" => $memberemail,
                    "membername" => $membername,
                    "memberage" => $memberage,
                    "height" => $height,
                    "weight" => $weight,
                    "allergies" => $allergies,
                    "status" => $status
                ];
                // print_r($resArray);

                $nutrischedule = new Nutritionistschedule; 
                $nutrischedule->insert($resArray);

                $membertable = new Registeredmembers;
                $memberarr['height'] = $height; 
                $memberarr['weight'] = $weight; 
                $membertable->update($memberemail,$memberarr,'memberemail');
                
                redirect('memberdash');

            }
            

            $this->view('Member/schedulenutrimeeting', $data);
        }

       
        public function getDate() {
            $data = json_decode(file_get_contents('php://input'), true);

            $date = $data[0]['date'];
            $nutriname = $data[0]['nutritionistname'];

    
            // echo json_encode($date);
            // echo json_encode($nutriname);

            $this->getTimeSlots($date,$nutriname);

        }

        public function getNutritionistName() {
            $data = json_decode(file_get_contents('php://input'), true);

            $nutriname = $data[0]['nutritionistname'];
    
            // echo json_encode($nutriname);
        }

        public function getTimeSlots($date,$nutritionistname) {
            $nutrischedule = new Nutritionistschedule;
            $detailarr['date'] = $date;
            // $detailarr['nutritionistname'] = $nutritionistname;

            $nutritionist = new User;
            $array['name'] = $nutritionistname;
            // echo json_encode($array);

            $nutridetails = $nutritionist->where($array);
            $detailarr['nutritionistemail'] = $nutridetails[0]->email;
            $detailnotarr['status'] = "Cancelled";
            // echo json_encode($detailarr);

            $scheduledetails = $nutrischedule->where($detailarr,$detailnotarr);
            // echo json_encode($scheduledetails);

            $timeslots = [];
            for ($i=0; $i < count($scheduledetails); $i++) { 
                // $timeslots = $scheduledetails[$i]->timeslot;
                array_push($timeslots, $scheduledetails[$i]->timeslot);
            }
            echo json_encode($timeslots);
        }
        
}