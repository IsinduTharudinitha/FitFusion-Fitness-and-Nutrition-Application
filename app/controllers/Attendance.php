<?php

class Attendance{
    use Controller;
        public function index() {
            $data = [];
            $this->view('attendance', $data);
        }
}