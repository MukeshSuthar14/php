<?php

class Frontend extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $data = [];
        $data['pageTitle'] = 'Home';
        return $this->view('home', $data);
    }

    public function aboutUs(){
        $data = [];
        $data['pageTitle'] = 'About Us';
        return $this->view('home', $data);
    }

    public function contactUs(){
        $data = [];
        $data['pageTitle'] = 'Contact Us';
        return $this->view('home', $data);
    }

    public function getUser($id){
        
    }

    public function pageNotFound(){
        $data = [];
        $data['pageTitle'] = 'Page Not Found';
        return $this->view('page-not-found', $data);
    }

}