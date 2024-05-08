<?php

class Attendancememberlist{
    use Controller;
        public function index() {
            $data=[];
            $gym=new Gym;
            $regmem=new Registeredmembers;

            $arr1['manageremail']=$_SESSION['email'];
            $gymdetails=$gym->where($arr1);
            $arr2['gymName']=$gymdetails[0]->gymName;
            $members=$regmem->where($arr2);

            $count1=0;
            if(!empty($members)){
                foreach($members as $member){
                    if($member->generatedcode!=''){
                        $data['qrmembers'][$count1]=$member;
                        $count1++;
                    }
                    
                }
            }

           // print_r($data['qrmembers']);
            //$data=$members;


            if ($_SERVER['REQUEST_METHOD']=='POST') {
              

            }



            $this->view('attendancememberlist', $data);
        }
}