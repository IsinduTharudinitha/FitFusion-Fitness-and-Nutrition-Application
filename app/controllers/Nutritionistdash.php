<?php

class Nutritionistdash {
    use Controller;

    public function index() {
        if (!isset($_SESSION['email'])) {
            redirect('login');
        }

        $data = [];

        $nutritionist = new Registerednutritionist;
        $meeting = new Nutritionistschedule;

        $gym = new Gym;
        $allnutri = new Nutritionistdetails;

        $members = $meeting->where(['nutritionistemail' => $_SESSION['email']]);
        // $arr['status'] = 'confirmed';                                             //getting member details

        $nutrimembers= [];
        if(!empty($members)){
            foreach($members as $member){
                if($member->status =='Done'){
                    $nutrimembers[] = $member;
                }
        }
        }
      

       $mynutri = $allnutri->where(['nemail' => $_SESSION['email']]);

      $mynutritionist = $mynutri[0];

     //  $data['instr']['name'] =  $mynutritionist->name;

        
        
        $ins = $nutritionist->where(['nutritionistemail' => $_SESSION['email']]);
        $gymmanageremail = $ins[0]->manageremail;
        //$arr1['email'] = $gymemail;
        $mygym = $gym->where(['manageremail'=> $gymmanageremail]);                                                //getting gym details

        $nutri = $nutritionist->where(['nutritionistemail' => $_SESSION['email']]);
        
        $nutri_data = $nutri[0];
        $data['nutri'] = [                       
             'name' => $mynutritionist->name,                                                                                //nutritionist details
            'email' => $nutri_data->nutritionistemail,
            'manageremail' => $nutri_data->manageremail,
            'gymemail' => $nutri_data->gymemail
        ];

         
        $gym_data = $mygym[0];
        $data['gym'] = [
            'name' => $gym_data->gymName,
            'email' => $gym_data->email,
            'manageremail' => $gym_data->manageremail,
            'description' => $gym_data->description
        ];

       //print_r($nutrimembers);
        $count=0;
        foreach ($nutrimembers as $mymember) {
            $data['membernames'][$count] = $mymember->membername;
            $count++;

        }


        $mynutritionist = $mynutri[0];

        //  $data['instr']['name'] =  $mynutritionist->name;



        $nutri = $nutritionist->where(['nutritionistemail' => $_SESSION['email']]);
        $gymmanageremail = $nutri[0]->manageremail;
        //$arr1['email'] = $gymemail;
        $mygym = $gym->where(['manageremail' => $gymmanageremail]);                                                //getting gym details

        $nutri = $nutritionist->where(['nutritionistemail' => $_SESSION['email']]);

        $nutri_data = $nutri[0];
        $data['nutri'] = [
            'name' => $mynutritionist->name,                                                                                //nutritionist details
            'email' => $nutri_data->nutritionistemail,
            'manageremail' => $nutri_data->manageremail,
            'gymemail' => $nutri_data->gymemail
        ];


        $gym_data = $mygym[0];
        $data['gym'] = [
            'name' => $gym_data->gymName,
            'email' => $gym_data->email,
            'manageremail' => $gym_data->manageremail,
            'description' => $gym_data->description
        ];

        // print_r($nutrimembers);
        $count = 0;
        if ($nutrimembers) {
            foreach ($nutrimembers as $mymember) {
                $data['membernames'][$count] = $mymember->membername;
                $count++;
            }
        }
        else {
            $data['membernames'] = [];
        }







        $this->view('nutritionistdash', $data);
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}