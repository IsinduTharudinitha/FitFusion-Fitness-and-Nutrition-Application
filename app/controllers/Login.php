<?php

class Login {
    use Controller;
   
    public function index() {


        if(isset($_SESSION['email'])){
                    if($_SESSION['usertype']=="member") {
                        redirect('memberdash');
                        die();
                    } else if($_SESSION['usertype']=="gyminstructor") {
                        redirect('instructordash');
                        die();
                    } else if($_SESSION['usertype']=="nutritionist") {
                        redirect('nutritionistdash');
                        die();
                    } else if($_SESSION['usertype']=="gymmanager") {
                        $gym=new Gym;
                        $arr['manageremail']=$_SESSION['email'];
                        $gymdata=$gym->where($arr);
                        if(isset($gymdata[0])){
                            //print_r($gymdata);
                           redirect('managerdash');
                        }else{
                           redirect('addgym');
                           
                        }
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
        // redirect("login");
        }

        $data = [];

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $user = new User;
            $arr['email'] = $_POST['email'];

            $row = $user->first($arr);

            if($row) {
                // echo "hello";
            
                //$this->createUserSession($row);
                if(password_verify($_POST['password'],
                $row->password)){
                    $_SESSION['USER'] = $row;
                    $_SESSION['email'] = $row->email;
                    $_SESSION['usertype'] = $row->usertype;
                    if($row->usertype=="member") {

                        $member = new Registeredmembers;
                        $memberarr1['memberemail'] = $_POST['email'];
                        $checkmember = $member->first($memberarr1);
                        // print_r($checkmember);

                        if($checkmember) {
                            $checkworkout = $checkmember->workoutid;
                            // print($checkworkout);
                            if($checkworkout!=0) {
                                $checkmealplan = $checkmember->mealplanname;
                                // print_r($checkmealplan);
                                if($checkmealplan!=0) {
                                    redirect('memberdash');
                                }
                                elseif($checkmember->packagegroup=='instructor') {
                                    // print_r($checkmember->packagegroup);
                                    redirect('memberdash');
                                }
                                else {
                                    // what if a meeting is already scheduled????
                                    $checkarr['gymemail'] = $checkmember->gymemail;
                                    $checkarr['memberemail'] = $checkmember->memberemail;
                                    $checkmembernutri = new Nutritionistschedule;
                                    $isMeetingNutri = $checkmembernutri->where($checkarr);
                                    if($isMeetingNutri) {
                                        if($isMeetingNutri[0]->status=="Pending" or $isMeetingNutri[0]->status=="Done") {
                                            redirect('memberdash');
                                        }
                                        elseif ($isMeetingNutri[0]['status']=="Cancelled") {
                                            redirect('schedulenutrimeeting');
                                        }

                                    }
                                }
                            }
                            else {
                                $checkarr['gymemail'] = $checkmember->gymemail;
                                $checkarr['memberemail'] = $checkmember->memberemail;
                                $checkmember1 = new InstrSchedule;
                                $isMeeting = $checkmember1->where($checkarr);
                                print_r($isMeeting);
                                if ($isMeeting) {
                                    if ($isMeeting[0]->status=="Pending" or $isMeeting[0]->status=="Done") {
                                        print_r($isMeeting[0]->status);
                                        // check if they have a instrnutri packagegroup. 
                                        if ($checkmember->packagegroup=='instrnutri') {
                                            $checkmembernutri = new Nutritionistschedule;
                                            $isMeetingNutri = $checkmembernutri->where($checkarr);
                                            if($isMeetingNutri) {
                                                if($isMeetingNutri[0]->status=="Pending" or $isMeetingNutri[0]->status=="Done") {
                                                    redirect('memberdash');
                                                }
                                                elseif ($isMeetingNutri[0]['status']=="Cancelled") {
                                                    redirect('schedulenutrimeeting');
                                                }

                                            }
                                            // TODO make nutrschedule table. get the status of the member by using the memberemail and the gymemail
                                            // TODO then check if nutrimeeting status is Pending or confirmed, then redirect to dashboard
                                            // TODO if nutri meeting status is cancelled, then redirect to nutrimeeting page.
                                        }
                                        else {
                                            redirect('memberdash');
                                        }
                                        
                                        
                                    }
                                    elseif ($isMeeting[0]['status']=="Cancelled") {
                                        redirect('scheduleinstrmeeting');
                                    }
                                }
                                redirect('scheduleinstrmeeting');
                            }
                        }
                        else {
                            redirect('selectgym');
                        }

                    } else if($row->usertype=="gyminstructor") {
                        redirect('instructordash');
                    } else if($row->usertype=="nutritionist") {
                        redirect('nutritionistdash');
                    } else if($row->usertype=="gymmanager") {
                        $gym=new Gym;
                        $managerarr['manageremail']=$_SESSION['email'];
                        $gymdata=$gym->where($managerarr);
                        //print_r($gymdata);
                        if(isset($gymdata[0])){
                            //print_r($gymdata);
                            redirect('managerdash');
                            // $gym->errors['email'] ="hello dmiik how au";
                          
                        }else{
                           redirect('addgym');
                        //    $gym->errors['email'] = "thelijj cetl collge";
                        }
                       
                    } else if($row->usertype=="gymowner") {
                        redirect('gymownerdash');
                    } else if($row->usertype=="admin") {
                        redirect('admindash');
                    }
                }
            }
            // set session to row

            $user->errors['email'] = "Incorrect email or password";
            $data['errors'] = $user->errors;
            // $data['errors'] = $gym->errors;
        }

        $this->view('Main/login', $data);
    }
   
}