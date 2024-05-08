<?php

class Gympagetest {
    use Controller;

    public function index() {
        if(!isset($_SESSION['email'])){
            redirect('login');
         }

        $gym = new Gym;
        $address=new Address;
        $openhours=new Openhours;
        $packages=new Package;
        $gymimages=new Gymimages;

        if(isset($_GET['id'])){
            $idd=$_GET['id'];

            $arr1['id'] = $idd;
           
            $gymdata=$gym->first($arr1);
            $data['id']=$idd;
            $data['gymName']=$gymdata->gymName;
            $data['email']=$gymdata->email;
            $data['manageremail']=$gymdata->manageremail;
            $data['description']=$gymdata->description;
            

            //get location details
            
            $arr2['gymName'] = $data['gymName'];
            $locationdata=$address->first($arr2);
    
            $data['location1']=$locationdata->location1;
            $data['location2']=$locationdata->location2;
            $data['location3']=$locationdata->location3;

            //get open hours
            
            
            $openhoursdata=$openhours->first($arr2);
    
            $data['openhourswf']=$openhoursdata->openhourswf;
            $data['openhourswt']=$openhoursdata->openhourswt;
            $data['openhourssaf']=$openhoursdata->openhourssaf;
            $data['openhourssat']=$openhoursdata->openhourssat;
            $data['openhourssuf']=$openhoursdata->openhourssuf;
            $data['openhourssut']=$openhoursdata->openhourssut;
            

            //get package details
            $arr3['manageremail'] = $data['manageremail'];
            $packagesdata=$packages->where($arr3);
            //print_r($packagesdata);
            if(isset($packagesdata)){
                $limit=count($packagesdata);
            }
            
            if(!($limit<4)){
                $limit=4;
            }
            for($x=0;$x<$limit;$x++){
                $data[$x]['packagetype']=$packagesdata[$x]->packagetype;
                $data[$x]['description']=$packagesdata[$x]->description;
                $data[$x]['paymentperiod']=$packagesdata[$x]->paymentperiod;
                $data[$x]['amount']=$packagesdata[$x]->amount;
            }
            $data['limit']=$limit;

            //get gym images
            $arr4['manageremail'] = $data['manageremail'];
            $gymimagesdata=$gymimages->where($arr4);
            //print_r($gymimagesdata);
            $y=0;
            foreach($gymimagesdata as $img){
                $data['image'][$y]=$img->image_url;
                $y=$y+1;
            }
       
           


            
        }
        // $member = new Member;
        // $arr['name'] = "Mary";
        // $arr['age'] = 30;

        // $result = $user->findAll();

        // show($result);
        // show("from the index function");
        //print_r($data);
        $this->view('gympagetest',$data);
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}