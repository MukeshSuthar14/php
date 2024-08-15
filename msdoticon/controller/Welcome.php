<?php

class Welcome extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $res = $this->db->select('i_id')->table('login_master')->get();
        return "This Is MsDotIcon";
    }

    public function add(){
        echo "<pre>";
        print_r($_POST);
    }

}