<?php

class LoginModel extends Mysql
{
    private $intIdUsuario;
    private $strUsuario;
    private $strPassword;
    private $strToken;

    public function __construct()
    {
        parent::__construct();
    }

    public function loginUser(string $usuario,string $password)
    {
        $this->strUsuario = $usuario;
        $this->strPassword = $password;

        $sql = "SELECT idusuario,status FROM usuario WHERE usuario = '$this->strUsuario' and password = '$this->strPassword' and status != 0";
        $request = $this->select($sql);
        return $request;
    }
    public function sessionLogin(int $iduser)
    {
        $this->intIdUsuario = $iduser;

        $sql = "SELECT usuario,nombre,apellido,telefono,direccion,correo FROM usuario WHERE idusuario= $this->intIdUsuario";
        
        $request = $this->select($sql);

        return $request;
    }
    public function getUserEmail(string $strEmail)
    {
        $this->strUsuario = $strEmail;
        $sql = "SELECT * FROM usuario WHERE correo = '$this->strUsuario' and status = 1";
        $request = $this->select($sql);
        return $request;
    }
    public function setTokenUser(int $idUsuario,string $token){
        $this->intIdUsuario = $idUsuario;
        $this->strToken = $token;

        $sql = "UPDATE usuario SET token = ? WHERE idusuario = $this->intIdUsuario";
        $arrData = array($this->strToken);
        $request = $this->update($sql,$arrData);
        return $request;
    }
    public function getUsuario(string $email, string $token)
    {
        $this->strUsuario = $email;
        $this->strToken = $token;
        $sql = "SELECT idusuario FROM usuario WHERE correo = '$this->strUsuario' and 
        token = '$this->strToken' and status = 1";
        $request = $this->select($sql);
        return $request;
    }


}

?>
