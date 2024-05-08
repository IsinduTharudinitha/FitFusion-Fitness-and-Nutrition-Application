<?php

class Test{
    use Controller;
        public function index() {
            $data = [];
            $this->view('test', $data);
        }
}