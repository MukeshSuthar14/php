<?php

class Controller {

    public $db = null;

    public function __construct(){
        $this->db = new QueryBuilder();
    }

    public function view($page, $data = [], $return = false){
        ob_start();
        extract($data);
        require_once(BASE_PATH.'/view/'.$page.'.php');
        if($return){
            return ob_get_clean();
        }
    }

}