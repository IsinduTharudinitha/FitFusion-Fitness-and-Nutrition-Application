<?php

class Scheduleinstrmeeting{
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
            // print_r($arr);
            $memberdetails = $regmembers->where($arr);
            print_r($memberdetails);
            $gymemail = $memberdetails[0]->gymemail;
            // print_r($gymemail);
            $data['gymemail'] = $gymemail;

            $reginstructors = new Registeredinstructor;
            // print_r($reginstructors);
            $arr2['gymemail'] = $gymemail;
            // print_r('gymemail'.$arr2['gymemail']);
            $instructordetails = $reginstructors->where($arr2); // array of details are here

            // echo $instructordetails;
            // echo "hiiiii";
            // $instructoremails = [];
            $instrnamelist = [];
            if($instructordetails) {
                for ($i=0; $i < count($instructordetails); $i++) { 

                    $instructoremails = $instructordetails[$i]->instructoremail;
                    // print_r($instructoremails);
                    $data['instructoremail'] = $instructoremails;
                    // print_r($data['instructoremail']);

                    $instructors = new User;
                    // print_r($instructors);
                    $arr3['email'] = $instructoremails;
                    print_r($arr3['email']);
                    $instrdetails = $instructors->where($arr3);
                    $instrnames = $instrdetails[0]->name;
                    // print_r($instrnames);
                    // print_r($instrdetails);
                    // print_r($instructors->where($arr3));
                    array_push($instrnamelist, $instrnames);
                }
            }
                

            $data['instructorlist'] = $instrnamelist;

            // print_r($instrnamelist);
            // print_r($data['instructorlist']);

            // SEND THE TIMESLOTS USING AJAX
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                // print_r($_POST);


                // INSERTING DATA INTO THE DB PROCESS

                // print_r($_POST['InstrName']);

                $instructorname = $_POST['InstrName'];

                $instructor = new User;
                // print_r($instructor);
                $instrdeets['name'] = $instructorname;
                // print_r($arr3['email']);
                $instrdetails = $instructor->where($instrdeets);
                $instructoremail = $instrdetails[0]->email; /////////////////
                // print_r('instremail'.$instructoremail);

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
                $goal = $_POST['goal'];
                $illness = $_POST['illness'];

                $status = "Pending";

                // print_r($status);
                // print_r($gymemail);
                //add all the needed stuff and insert to the DB
                $resArray = [
                    "instructoremail" => $instructoremail,
                    "gymemail" => $gymemail,
                    "date" => $date,
                    "timeslot" => $timeslot,
                    "memberemail" => $memberemail,
                    "membername" => $membername,
                    "memberage" => $memberage,
                    "goal" => $goal,
                    "illness" => $illness,
                    "status" => $status
                ];
                // print_r($resArray);

                $instrschedule = new Instrschedule; 
                $instrschedule->insert($resArray);

                $membertable = new Registeredmembers;
                $memberarr['age'] = $memberage; 
                $membertable->update($memberemail,$memberarr,'memberemail');


                // check package
                $checkmember = new Registeredmembers();
                $checkarr['memberemail'] = $memberemail;
                $memberdeets = $checkmember->where($checkarr);
                $memberpackagegroup = $memberdeets[0]->packagegroup;
                // if package is instructor, redirect to dashboard
                if ($memberpackagegroup=='instructor') {
                    redirect('memberdash');
                }
                // if package is intrnutri, use member email and gym email and get the record of them in the nutritionistschedule table of the DB.
                elseif ($memberpackagegroup=='instrnutri') {
                    $checknutri = new Nutritionistschedule;
                    $nutriarr['gymemail'] = $gymemail;
                    $nutriarr['memberemail'] = $memberemail;
                    $nutrideets = $checknutri->where($nutriarr);
                    // if record exists, get the status of the record
                    if($nutrideets) {
                        $nutristatus = $nutrideets[0]->status;
                        // print_r($nutristatus);
                        // if status is pending or done, redirect to dashboard
                        if ($nutristatus=='Pending' or $nutristatus=='Done') {
                            redirect('memberdash');
                        }
                        // if status is cancelled, redirect to nutritionistmeeting page
                        elseif ($nutristatus=='Cancelled') {
                            redirect('schedulenutrimeeting');
                        }
                    }
                    // if record does not exist, redirect to nutritionistmeeting page
                    else {
                        redirect('schedulenutrimeeting');
                    }
                }

            }
            

            $this->view('Member/scheduleinstrmeeting', $data);
        }

       
        public function getDate() {
            $data = json_decode(file_get_contents('php://input'), true);

            $date = $data[0]['date'];
            $instrname = $data[0]['instructorname'];

    
            // echo json_encode($date);
            // echo json_encode($instrname);

            $this->getTimeSlots($date,$instrname);

        }

        public function getInstructorName() {
            $data = json_decode(file_get_contents('php://input'), true);

            $instrname = $data[0]['instructorname'];
    
            // echo json_encode($instrname);
        }

        public function getTimeSlots($date,$instructorname) {
            $instrschedule = new InstrSchedule;
            $detailarr['date'] = $date;
            // $detailarr['instructorname'] = $instructorname;

            $instructor = new User;
            $array['name'] = $instructorname;
            // echo json_encode($array);

            $instrdetails = $instructor->where($array);
            $detailarr['instructoremail'] = $instrdetails[0]->email;
            $detailnotarr['status'] = "Cancelled";
            // echo json_encode($detailarr);

            $scheduledetails = $instrschedule->where($detailarr,$detailnotarr);
            // echo json_encode($scheduledetails);


            $timeslots = [];
            for ($i=0; $i < count($scheduledetails); $i++) { 
                // $timeslots = $scheduledetails[$i]->timeslot;
                array_push($timeslots, $scheduledetails[$i]->timeslot);
            }
            echo json_encode($timeslots);
        }
        
}