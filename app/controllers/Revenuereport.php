<?php

class Revenuereport{
    use Controller;
        public function index() {
            $data=[];
            
            

            //$data=$members;


            if ($_SERVER['REQUEST_METHOD']=='GET') {
               
                $gym=new Gym;
                $regmembers=new Registeredmembers;
                $pckg=new Package;
    
                $arr1['manageremail']=$_SESSION['email'];
                $gymdata=$gym->where($arr1);
                $gymname=$gymdata[0]->gymName;
               // print_r($regmembers->packageIds($gymname));
                $arr=$regmembers->packageIds($gymname);
    
    
    
                $distinctPackageIds = array();
    
                foreach ($arr as $month => $packageIds) {
                    foreach (array_keys($packageIds) as $packageId) {
                        $distinctPackageIds[$packageId] = true;
                    }
                }
               // print_r(array_keys($distinctPackageIds));
               // print_r($pckg->packagePrice(array_keys($distinctPackageIds)));
                $prices=$pckg->packagePrice(array_keys($distinctPackageIds));
    
                $revenuearr=[];
                foreach($arr as $mnt=>$value){
                    $revenuearr[$mnt]=0;
                    foreach($value as $id=>$count){
                        $revenuearr[$mnt]+=$prices[$id]*$count;
                    }
                }
                for($x=1;$x<=12;$x++){
                    if(!isset($revenuearr[$x])){
                        $revenuearr[$x]=0;
                    }
                }
                //print_r($revenuearr);
                $data=$revenuearr;

            }



            $this->view('revenuereport', $data);
        }
}