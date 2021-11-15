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
                $strPassworde = hash("SHA256",$strPassword);
                $requestUser = $this->model->loginUser($strUsuario,$strPassworde);
                
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

                    $data = array('nombreUsuario' => $nombreUsuario,
											 'email' => $strEmail,
											 'asunto' => 'Recuperar cuenta - ',
											 'url_recovery' => $url_recovery);
                

                    if ($requestUpdate) {

                        $sendEmail = sendEmailLocal($data,'email_cambioPassword');

                        if($sendEmail){
                            $arrResponse = array('status' => true,'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar la contraseña' );
                        }else{
                            $arrResponse = array('status' => false,'msg' => 'No es posible realizar el proceso, intente mas tarde.' );
                        }
                    }else {
                        $arrResponse = array('status' => false,'msg' => 'No es posible realizar el proceso, intente mas tarde.' );
                    }
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function confirmUser(string $params)
    {
        if(empty($params)){
            header('Location: '.base_url());
        }else{
            $arrParams = explode(',',$params);
            $strEmail = $arrParams[0];
            $strToken = $arrParams[1];
            $arrResponse = $this->model->getUsuario($strEmail,$strToken);
            if(empty($arrResponse)){
                header("Location: ".base_url());
            }else{
                $data['page_tag'] = "Cambiar contraseña"; 
                $data['page_name'] = "cambiar_contrasenia";
                $data['page_title'] = "Cambiar Contraseña <small> Hotel Norma </small>";
                $data['correo'] = $strEmail;
                $data['token'] = $strToken;
                $data['idusuario'] = $arrResponse['idusuario'];
                $data['page_function_js']="function_login.js";
                $this->views->getView($this,"cambiar_password",$data);
            }
        }
        die();
    }

    public function setPassword() {
            

        if(empty($_POST['idUsuario2'])  || empty($_POST['txtEmail']) || empty($_POST['txtToken']) || empty($_POST['txtPassword2']) || empty($_POST['txtPasswordConfirm2'])){

            $arrResponse = array('status' => false, 'msg' => 'Error de datos' );
           
                                 
        }else{
            $intIdusuario = intval($_POST['idUsuario2']);
            $strPassword = $_POST['txtPassword2'];
            $strPasswordConfirm = $_POST['txtPasswordConfirm2'];
            $strEmail = strClean($_POST['txtEmail']);
            $strToken = strClean($_POST['txtToken']);
        
            
                if($strPassword != $strPasswordConfirm){
                 $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no son iguales.' );
                }
                else{
                    $arrResponseUser = $this->model->getUsuario($strEmail,$strToken);
                    if(empty($arrResponseUser)){
                        $arrResponse = array('status' => false, 'msg' => 'Error de datos.' );
                    }else{
                        $strPassword = hash("SHA256",$strPassword);
                        $requestPass = $this->model->insertPassword($intIdusuario,$strPassword);
                    if($requestPass)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada con éxito.' );
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intente nuevamente más tarde.' );
                    }
                    }
                }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }
}

?>
