<?php

class Instructordash
{
    use Controller;

    public function index()
    {
        if (!isset($_SESSION['email'])) {
            redirect('login');
        }

        $data = [];

        $instructor = new Registeredinstructor;
        $meeting = new Instrschedule;

        $gym = new Gym;
        $allinstrs = new Instructordetails;

        $members = $meeting->where(['instructoremail' => $_SESSION['email']]);
        // $arr['status'] = 'confirmed';                                             //getting member details

        $insmembers= [];
        if(!empty($members)){
            foreach($members as $member){
                if($member->status =='Done'){
                    $insmembers[] = $member;
                }
        }
        }
      

       $myins = $allinstrs->where(['iemail' => $_SESSION['email']]);

      $myinstructor = $myins[0];

     //  $data['instr']['name'] =  $myinstructor->name;

        
        
        $ins = $instructor->where(['instructoremail' => $_SESSION['email']]);
        $gymmanageremail = $ins[0]->manageremail;
        //$arr1['email'] = $gymemail;
        $mygym = $gym->where(['manageremail'=> $gymmanageremail]);                                                //getting gym details

        $instr = $instructor->where(['instructoremail' => $_SESSION['email']]);
        
        $instr_data = $instr[0];
        $data['instr'] = [                       
             'name' => $myinstructor->name,                                                                                //instructor details
            'email' => $instr_data->instructoremail,
            'manageremail' => $instr_data->manageremail,
            'gymemail' => $instr_data->gymemail
        ];

         
        $gym_data = $mygym[0];
        $data['gym'] = [
            'name' => $gym_data->gymName,
            'email' => $gym_data->email,
            'manageremail' => $gym_data->manageremail,
            'description' => $gym_data->description
        ];

       //print_r($insmembers);
        $count=0;
        foreach ($insmembers as $mymember) {
            $data['membernames'][$count] = $mymember->membername;
            $count++;

        }


        $myinstructor = $myins[0];

        //  $data['instr']['name'] =  $myinstructor->name;



        $ins = $instructor->where(['instructoremail' => $_SESSION['email']]);
        $gymmanageremail = $ins[0]->manageremail;
        //$arr1['email'] = $gymemail;
        $mygym = $gym->where(['manageremail' => $gymmanageremail]);                                                //getting gym details

        $instr = $instructor->where(['instructoremail' => $_SESSION['email']]);

        $instr_data = $instr[0];
        $data['instr'] = [
            'name' => $myinstructor->name,                                                                                //instructor details
            'email' => $instr_data->instructoremail,
            'manageremail' => $instr_data->manageremail,
            'gymemail' => $instr_data->gymemail
        ];


        $gym_data = $mygym[0];
        $data['gym'] = [
            'name' => $gym_data->gymName,
            'email' => $gym_data->email,
            'manageremail' => $gym_data->manageremail,
            'description' => $gym_data->description
        ];

        // print_r($insmembers);
        $count = 0;
        if ($insmembers) {
            foreach ($insmembers as $mymember) {
                $data['membernames'][$count] = $mymember->membername;
                $count++;
            }
        }
        else {
            $data['membernames'] = [];
        }







        $this->view('Instructor/instructordash', $data);
    }
}

