<?php

class Packages
{
    use Controller;

    public function index()
    {
        if(!isset($_SESSION['email'])){
            redirect('login');
        }

        $data = [];
        $package = new Package;


        $arr1['manageremail'] = $_SESSION['email'];
        $data['packages']=$package->where($arr1);
        //print_r($data);

        /////////////////////////////////////
        if (isset($_GET['deleteid'])) {
            $id = $_GET['deleteid'];

            $s = $package->deletepackage($id);
            redirect('packages');
        }
        ////////////////////////////////

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($package->validate($_POST)){
                $package->insert($_POST);
                redirect('packages');
            }
            else{
                //print_r("hello");
            }
            $arr2['manageremail']=$_SESSION['email'];
            $data = $package->where($arr2);
            
            $data['errors'] = $package->errors;
            //print_r($data['errors']);
        }
        // if($_SERVER['REQUEST_METHOD']=='GET'){
        //     if(isset($_GET['deleteid'])){
        //         $idd=$_GET['deleteid'];

        //         //$s=$package->delete($idd);
        //         redirect('manageresources');
        //     }
        // }

        $this->view('packages', $data);
    }


    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}