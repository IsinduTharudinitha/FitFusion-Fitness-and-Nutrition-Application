<?php

class Selectpackage
{
    use Controller;
    public function index()
    {
        $data = [];

        if (!isset($_SESSION['email'])) {
            redirect('login');
        }

        $gym = new Gym;

        if (isset($_GET['id'])) {
            $idd = $_GET['id'];

            $arr1['id'] = $idd;
            // print_r($idd);

            $gymdata = $gym->first($arr1);
            $data['id'] = $idd;
            $data['gymName'] = $gymdata->gymName;
            $data['email'] = $gymdata->email;
            $data['manageremail'] = $gymdata->manageremail;

            // GET THE GYM PACKAGES BY THE MANAGEREMAIL
            $packages = new Package;
            $arr2['manageremail'] = $data['manageremail'];
            // print_r($arr2['manageremail']);

            $packagedeets = $packages->where($arr2);
            // print_r($packagedeets);

            $allpackagetypes = [];
            $allpackagegroups = [];
            $alldescriptions = [];
            $allpaymentperiods = [];
            $allamounts = [];

            for ($i = 0; $i < count($packagedeets); $i++) {
                array_push($allpackagetypes, $packagedeets[$i]->packagetype);
                array_push($allpackagegroups, $packagedeets[$i]->packagegroup);
                array_push($alldescriptions, $packagedeets[$i]->description);
                array_push($allpaymentperiods, $packagedeets[$i]->paymentperiod);
                array_push($allamounts, $packagedeets[$i]->amount);
            }

            $data['allpackagetypes'] = $allpackagetypes;
            $data['allpackagegroups'] = $allpackagegroups;
            $data['alldescriptions'] = $alldescriptions;
            $data['allpaymentperiods'] = $allpaymentperiods;
            $data['allamounts'] = $allamounts;
        }

        // $gymdata = $gym->findAll();
        // for($x=0;$x<count($gymdata);$x++){
        //     $data[$x]['gymName']=$gymdata[$x]->gymName;
        //     $data[$x]['id']=$gymdata[$x]->id;

        //     $arr3['gymName']= $data[$x]['gymName'];
        //     // $locationdata=$address->first($arr3);


        // }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $data['errors'] = $user->errors;
        }

        $this->view('Member/selectpackage', $data);
    }

    public function payhereprocesss()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = trim($_POST['selectedPackage']);
        }
        $data = [
            'amount'=>$amount,
        ];

       
        $amount = $amount;
        $merchant_id = "1226456";
        $order_id = 2;
        $currency = 'LKR';
        $merchant_secret = "MzczNDA0MzA2MTI1OTczMjI5MjgxMDQ5NDcwMDExMTM3NTIyMjUwNQ==";
        $hash = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );
        $array = [];
        $array['amount'] = $amount;
        $array['merchant_id'] = $merchant_id;
        $array['order_id'] = $order_id;
        $array['currency'] = $currency;
        $array['hash'] = $hash;
        $array['first_name'] = 'dew';
        $array['last_name'] = 'Liyanage';
        $array['email'] = 'dinu@gmail.com';
        $array['phone'] = '0771234567';
        $array['address'] = 'No.1, Galle Road';
        $array['city'] = 'Colombo';
        $array['country'] = 'Sri Lanka';
        $array['items'] = 'package';

        $jsonObj = json_encode($array);
        echo $jsonObj;
    }

    public function markAsPaid() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['selectedUserEmail']);
            $amount = trim($_POST['selectedPackage']);
            $packagetype = trim($_POST['selectedPackageType']);
            $manageremail = trim($_POST['gymmanageremail']);
        }
        $data = [
            'email'=>$email,
            'amount'=>$amount,
            'packagetype'=>$packagetype,
            'manageremail'=>$manageremail
        ];

        $arr4['email'] = $data['email'];
        $arr4['amount'] = $data['amount'];
        $arr4['paymentdate'] = date('Y-m-d');


        $payment = new Payment;
        $payment->insert($arr4);

        $arr5['manageremail'] = $data['manageremail'];
        $arr5['packagetype'] = $data['packagetype'];

        $package = new Package;
        $packagedeets = $package->where($arr5);

        $packageid = $packagedeets[0]->id;
        $packagegroup = $packagedeets[0]->packagegroup;

        $arr6['manageremail'] = $data['manageremail'];
        $gym = new Gym;
        $gymdeets = $gym->where($arr6);
        // print_r($gymdeets);
        $gymname = $gymdeets[0]->gymName;
        $gymemail = $gymdeets[0]->email;

        $arr7 = [
            'memberemail' => $data['email'],
            'gymname' => $gymname,
            'packageid' => $packageid,
            'packagegroup' => $packagegroup,
            'gymemail' => $gymemail,
            'workoutid' => 0,
            'mealplanname' => 0,
            'generatedcode' => 0,
            'height' => 0,
            'weight' => 0,
            'age' => 0
        ];
        // print_r($arr7);
        $regmember = new Registeredmembers;
        $regmember->insert($arr7);

    }
}
// $merchant_id = "1226456";
// $order_id = 2; ///////////////////// uniqid() ??????
// $currency = 'LKR';
// $merchant_secret = "MzczNDA0MzA2MTI1OTczMjI5MjgxMDQ5NDcwMDExMTM3NTIyMjUwNQ==";