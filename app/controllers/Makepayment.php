<?php

class Makepayment{
    use Controller;
        public function index() {
            $data = [];

            $this->view('makepayment', $data);
        }

}