<?php

class Tasklist{
    use Controller;
        public function index() {
            $this->view('taskList');
        }
}