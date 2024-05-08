<?php

class instrTimeSlots{
    use Controller;
        public function index() {
            $data = [];

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $timeslot = new Instrschedule; // table content -> instructorID, timeSlot

                if($timeslot->exists($_POST)) {
                    $data['errors'] = $timeslot->errors;
                } else {
                    $timeslot->insert($_POST);
                    reidrect('reqsuccessful'); //save the data in the database with a status (0 is not confirmed and 1 is confirmed by the instructor)
                }
            }

            // status update and make the frontend together. remove the meeting type and only have the initial meeting.
            // Progress meetings should be notified every 3 months, and the instructor will be in charge

            $this->view('Appointments/instrTimeSlots', $data);
        }
        // make the send the complaints.
}