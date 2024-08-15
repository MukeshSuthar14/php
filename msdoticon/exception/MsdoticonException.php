<?php

class MsdoticonException {

    public function __construct(){
        
    }

    public function report(){

    }

    public function render($error){
        view('exception', [ 'error' => $error ]);
    }

}
