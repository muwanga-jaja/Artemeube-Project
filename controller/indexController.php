<?php

//controller class
class IndexController extends Controller{
    //constructor
    function __construct(){
        parent:: __construct();
    }

    function indexController(){
        $this->view->allrecords=$this->model->getAllrecords();
        $this->view->render("IndexController/indexController");
    }

    function editSubmitIndex(){
        $action=$_POST['submit'];
        if($action=="submit"){
            //echo the action value-- now skipped
            $args=$_POST["id"];
            $data= array(
                'id'=> null,
                'name'=>$_POST['username'],
                'email'=>$_POST['user_email'],
                'password'=>$_POST['user_password'],
                'role'=>$_POST['user_role']
            );
            $this->model->submitIndex($data);
        }
        header("location:index.php?msg=Login_test");
    }

}

?>