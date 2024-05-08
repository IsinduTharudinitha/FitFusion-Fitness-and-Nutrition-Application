<?php

class MakeComplaint{
    use Controller;
        public function index() {
            $data = [];

            $user = new User;
            $arr1['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr1);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;
            

            $newcomplaint = new Membercomplaints;

            $arr['memberEmail'] = $_SESSION['email'];
            // print_r($_SESSION);
            $arr2['reply'] = "not replied";
            $allcomplaintdeets = $newcomplaint->where($arr,$arr2);

            // print_r($allcomplaintdeets);

            $complaintarr = [];
            $replyarr = [];
            
            if($allcomplaintdeets) {
                $data['flag'] = 1;
                for ($i=0; $i < count($allcomplaintdeets); $i++) {
                    $complaintcontent = $allcomplaintdeets[$i]->description;
                    // print_r($complaintcontent);
                    array_push($complaintarr,$complaintcontent);
                    // print_r($complaintarr['complaintsSent']);
    
                    $replycontent = $allcomplaintdeets[$i]->reply;
                    // print($replycontent);
                    array_push($replyarr,$replycontent);
                    // print_r($replyarr['repliesSent']);
                }

                $data['allcomplaints'] = $complaintarr;
                $data['allreplies'] = $replyarr;
            }
            else {
                $data['flag'] = 0;
            }

            // print_r($data);

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                $complaint = new Membercomplaints;
    
                $resArray = [
                    "memberemail" => $_SESSION['email'],
                    "type" => $_POST['complainttype'],
                    "description" => $_POST['complaint'],
                    "reply" => "not replied"
                ];

                $complaint->insert($resArray);
    
                $data['errors'] = $complaint->errors;
            }
    
            $this->view('Member/makeComplaint', $data);
        }

        public function getComplaint() {
            // Assume you receive a JSON payload with the complaint
            $data = json_decode(file_get_contents("php://input"), true);
        
            // Extract the complaint from the received data
            $complaint = $data[0]['complaint'];
        
            // Fetch the complaint and reply from the database
            // Assuming you have a database method to get the complaint details and its reply
            $newcomplaint = new Membercomplaints;
            $arr['memberemail'] = $_SESSION['email']; 
            $arr['description'] = $complaint;
            $complaintdeets = $newcomplaint->where($arr);
            $result['complaint'] = $complaintdeets['complaint'];
            $result['reply'] = $complaintdeets['reply'];


            if ($result) {
                // If details are found, return them as JSON
                echo json_encode([
                    'status' => 'success',
                    'data' => $result
                ]);
            } else {
                // Return an error message if no details are found
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No details found for the provided complaint.'
                ]);
            }
        }
        
}