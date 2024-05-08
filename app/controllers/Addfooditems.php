<?php

class Addfooditems{
    use Controller;
        public function index() {
            $data=[];

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $fooditems=new Fooditems;
                //print_r($_POST);
                $count=0;
                if($fooditems->validate($_POST)){
                    foreach($_POST['item_name'] as $item){
                        $arr['fooditem']=$item;
                        $arr['calories']=$_POST['calories'][$count];
                        if($fooditems->unique($arr)){
                            $fooditems->insert($arr);
                        }
                        
                        $count++;
                    }
                }
              $data['errors']=$fooditems->errors;

            }



            $this->view('addfooditems', $data);
        }
}