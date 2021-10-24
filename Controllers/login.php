<?php

class login extends Controllers{
    public function __construct()
    {
        session_start();
       
        if (isset($_SESSION['login'])) {
            header('Location:'.base_url().'home');
        }
        parent::__construct();
        
    }

    public function login(){
        $data['page_tag'] = "Login";
        $data['page_tittle'] = "Login";
        $data['page_name'] = "login";   
        $data['page_function_js']="function_login.js";
        $this->views->getView($this,"login",$data);
    }   

    public function loginUser(){
        
        if ($_POST) {
            if (empty($_POST['txtUsuario']) || empty($_POST['txtPassword'])) {
                $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
            }else {
                $strUsuario = strtolower(strClean($_POST['txtUsuario']));
                $strPassword = strClean($_POST['txtPassword']);
                $requestUser = $this->model->loginUser($strUsuario,$strPassword);
                
                if (empty($requestUser)) {
                    $arrResponse = array('status' => false,'msg' =>'El usuario o la constraseña es incorrecta');
                }else{
                    $arrData = $requestUser;
                    if ($arrData['status'] == 1) {
                       $_SESSION['idUser'] = $arrData['idusuario'];
                       $_SESSION['login'] = true;

                       $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                       $_SESSION['userData']=$arrData;

                       $arrResponse = array('status' => true,'msg' =>'ok');
                    }else {
                        $arrResponse = array('status' => false,'msg' =>'Usuario Inactivo');
                    }
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    public function resetPass(){
        if ($_POST) {
            if (empty($_POST['txtEmailReset'])) {
                $arrResponse = array('status' => false,'msg' => 'Error de datos' );
            }else {
                $token = token();
                $strEmail = strtolower(strClean($_POST['txtEmailReset']));
                $arrData = $this->model->getUserEmail($strEmail);

                if (empty($arrData)) {
                    $arrResponse = array('status' => false,'msg' => 'No existe el Usuario' );
                }else {
                    $idUsuario = $arrData['idusuario'];
                    $nombreUsuario = $arrData['nombre'].' '.$arrData['apellido'];
                    $url_recovery = base_url().'/login/confirmUser/'.$strEmail.'/'.$token;

                    $requestUpdate = $this->model->setTokenUser($idUsuario,$token);

                    if ($requestUpdate) {
                        $arrResponse = array('status' => true,'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar la contraseña' );
                    }else {
                        $arrResponse = array('status' => false,'msg' => 'No es posible realizar el proceso, intente mas tarde.' );
                    }
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

?>
