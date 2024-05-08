<?php

class Addattendancemember{
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
            foreach($members as $member){
                if($member->generatedcode==''){
                    $data['noqrmembers'][$count1]=$member->memberemail;
                    $count1++;
                }
                
            }
            //print_r($data['noqrmembers']);
            //$data=$members;


            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //print_r($_POST);
                $arr3['generatedcode']=$_POST['generatedcode'];
                $regmem->update($_POST['email'],$arr3,'memberemail');

            }



            $this->view('addattendancemember', $data);
        }
}