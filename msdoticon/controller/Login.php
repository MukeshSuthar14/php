<?php

class Login extends Controller {

    public $crudModel;

    public function __construct() {
        parent::__construct();
        $this->crudModel = new Login_model();
    }

    public function index() {
        $data = [];
        $data['pageTitle'] = 'Login';
        $this->view('admin/login/login', $data);
    }

    public function checkLogin(){
        if( isset($_POST['email']) && empty($_POST['email']) ){
            withInput();
            redirect('back');
        }
        if( isset($_POST['password']) && empty($_POST['password']) ){
            withInput();
            redirect('back');
        }
        $where = [];
        $where['v_email'] = (!empty($_POST['email']) ? $_POST['email'] : '');
        $recordInfo = $this->crudModel->onlyOne('login_master', [], $where);
        if(!empty($recordInfo)){
            if(password_verify($_POST['password'], $recordInfo['v_password'])){
                $_SESSION['user_name'] = $recordInfo['v_name'];
                $_SESSION['user_email'] = $recordInfo['v_email'];
                $_SESSION['user_role'] = $recordInfo['v_role'];
                $_SESSION['user_id'] = $recordInfo['i_id'];
                $_SESSION['is_login'] = true;
                redirect('welcome');
            } else {
                redirect('back');
                withInput();
            }
        } else {
            redirect('back');
            withInput();
        }
    }

}