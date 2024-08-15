<?php

class CheckLogin {

    public function __construct(){
        
    }

    public function check($request, Closure $next){
        if(isset($_SESSION) && isset($_SESSION['user_id'])){
            return $next($request);
        }
        return redirect('login');
    }

}