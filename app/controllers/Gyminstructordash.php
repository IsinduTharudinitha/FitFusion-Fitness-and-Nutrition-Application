<?php

class Gyminstructordash {
    use Controller;
    

    public function index() {
        $data=[];
        if(!isset($_SESSION['email'])){
            redirect('login');
         }

        // $gym = new Gym;
        // $address=new Address;
        // $gymimages=new Gymimages;

        // $gymdata = $gym->findAll();
        // for($x=0;$x<count($gymdata);$x++){
        //     $data[$x]['gymName']=$gymdata[$x]->gymName;
        //     $data[$x]['id']=$gymdata[$x]->id;

        //     $arr3['gymName']= $data[$x]['gymName'];
        //     $locationdata=$address->first($arr3);
    
        //     $data[$x]['location1']=$locationdata->location1;
        //     $data[$x]['location2']=$locationdata->location2;
        //     $data[$x]['location3']=$locationdata->location3;

        //     //get images
        //     $arr4['manageremail']=$gymdata[$x]->manageremail;
        //     $gymimagesdata=$gymimages->first($arr4);
        //     $data[$x]['gymimages']=$gymimagesdata->image_url;
        //     //print_r($gymimagesdata);
        // }

       
        
        //$data['image']=$img->image_url;
      
       
        
        

       

        // show($gymdata);
        // show("from the index function");
        $this->view('gyminstructordash',$data);
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}