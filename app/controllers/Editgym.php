<?php

class Editgym {
    use Controller;
 
    public function index() {
        if(!isset($_SESSION['email'])){
            redirect('login');
        }
        $data = [];

        $gyms = new Gym;
        $facilities=new Facilities;
        $addres=new Address;
        $openhours=new Openhours;


        //$data=$usertable->findAll();
        /////////////////////////////////////
       
        $arr1['manageremail'] = $_SESSION['email'];
        $gymdata=$gyms->first($arr1);

        $data['id']=$gymdata->id;
        $data['gymName']=$gymdata->gymName;
        $data['description']=$gymdata->description;
        $data['email']=$gymdata->email;
        $data['manageremail']=$gymdata->manageremail;
        
        //get open hours
        $arr2['gymName']= $data['gymName'];
        $openhorsdata=$openhours->first($arr2);

        $data['openhourswf']=$openhorsdata->openhourswf;
        $data['openhourswt']=$openhorsdata->openhourswt;
        $data['openhourssaf']=$openhorsdata->openhourssaf;
        $data['openhourssat']=$openhorsdata->openhourssat;
        $data['openhourssuf']=$openhorsdata->openhourssuf;
        $data['openhourssut']=$openhorsdata->openhourssut;
       
        //get  gym address
        
        $arr3['gymName']= $data['gymName'];
        $locationdata=$addres->first($arr3);

        $data['location1']=$locationdata->location1;
        $data['location2']=$locationdata->location2;
        $data['location3']=$locationdata->location3;

        //get gym facilities
         $data['wifi']='';$data['Car']='';$data['locker']='';$data['water']='';$data['ac']='';$data['croom']='';$data['wroom']='';
         $arr4['gymName']= $data['gymName'];
         $facilitiesdata=$facilities->where($arr4);
         for($x=0;$x<count($facilitiesdata);$x++){
            $data[$facilitiesdata[$x]->facility]='checked';
         }
         //print_r($facilitiesdata);
         //print_r($data);

        //redirect('manageresources');
        



        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $data1=[];
            $facility=[];
            $addressArr=[];
            $openhoursArr=[];

           
            $data1['gymName']=$_POST['gymName'];
            $data1['email']=$_POST['email'];
            $data1['description']=$_POST['description'];

            $emailarr['email']=$_POST['email'];
           // $unique = $gyms->where($emailarr);
            //print_r($unique);

            if($gyms->validate($data1) /*&& $gyms->unique($data1)*/){
                $gyms->update($data['id'],$data1);
                //redirect('gymmanagerdash');
            }
            //update facilities to the table
            $temp=["wifi","carparking","washrooms","changingrooms","locker","water","ac"];
            $facilities->delete($data['gymName'],'gymName');
            foreach($temp as $x){
                if(isset($_POST[$x])){
                    $facility['gymName']=$_POST['gymName'];
                    $facility['facility']=$_POST[$x];
                    //print_r($facility);
                    $facilities->insert($facility);
                    unset($facility['facility']);
                        
                }
            }

            //update gym address
            $temp2=["location1","location2","location3"];
            $data2['gymName']=$_POST['gymName'];
            if(true/*check for repeating gym names */){
                $addressArr['gymName']=$_POST['gymName'];
                foreach($temp2 as $x){
                    if(isset($_POST[$x])){
                        $addressArr[$x]=$_POST[$x];
                    }
                }
                print_r($addressArr);
                $addres->update($data['gymName'],$addressArr,'gymName');  
                //redirect('gymmanagerdash');
            }

            //update gym open hours
            $temp3=["openhourswf","openhourswt","openhourssaf","openhourssat","openhourssuf","openhourssut"];
            $data3['gymName']=$_POST['gymName'];
            if(true/*check for repeating gym names */){
                $openhoursArr['gymName']=$_POST['gymName'];
                foreach($temp3 as $x){
                    if(isset($_POST[$x])){
                        $openhoursArr[$x]=$_POST[$x];                      
                    }
                }
                $openhours->update($data['gymName'],$openhoursArr,'gymName');  
                //redirect('gymmanagerdash');
            }
            
          
    
            $data['errors'] = $gyms->errors;
            redirect("gymmanagerdash");
        }

        $this->view('editgym',$data);
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}
/////////////////////
/////////////////////

//unique gymName karan eka balnnn/////////////

/////////////////////
/////////////////////