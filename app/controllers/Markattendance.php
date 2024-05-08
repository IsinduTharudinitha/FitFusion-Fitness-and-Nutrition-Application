<?php

class Markattendance{
    use Controller;
        public function index() {
            $data=[];
            $att=new Memberattendance;
            $regmembers=new Registeredmembers;
            $arr1['manageremail']=$_SESSION['email'];
            $attendance=$att->where($arr1);
            $data['attendance']=$attendance;
            //$data=$members;


            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $arr2['generatedcode']=$_POST['detected-qr-code'];
                $mem=$regmembers->where($arr2);
                if(!empty($mem)){
                    $arr3['manageremail']=$_SESSION['email'];
                    $arr3['memberemail']=$mem[0]->memberemail;
                    date_default_timezone_set('Asia/Colombo');
                    $arr3['datee']=date('Y-m-d');
                    $arr3['time']=date('H:i:s');
                    $arr3['weekdy']=date('l');
                    $att->insert($arr3);
                    redirect("markattendance");
                    die();
                }
                else{
                    // error handling part
                }
                //print_r($_POST);
               

            }



            $this->view('markattendance', $data);
        }
}