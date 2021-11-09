<?php

class ClienteModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    public function insertCliente($idCliente,$NombreCliente,$ApellidoCliente,$DireccionCliente,$EdadCliente)
    {
        $query_insert = "INSERT INTO cliente (idcliente,nombre,apellido,direccion,edad) VALUES(?,?,?,?,?)";
        $arrData = array($idCliente,$NombreCliente,$ApellidoCliente,$DireccionCliente,$EdadCliente);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    public function selectCliente()
    {
        $sql = "SELECT * FROM cliente";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectIdCliente($idCliente)
    {
        $sql = "SELECT * FROM cliente WHERE idcliente = '$idCliente'";
        $request = $this->select($sql);
        return $request;
    }
    public function updateCliente(String $idCliente,String $NombreCliente,String $ApellidoCliente,String $DireccionCliente,int $EdadCliente)
    {
        $this->idCliente = $idCliente;
        $this->Nombre = $NombreCliente;
        $this->Apellido = $ApellidoCliente;
        $this->Direccion = $DireccionCliente;
        $this->edad = $EdadCliente;
        // $this->caracteristica = $CaracteristicaHabitacion;

        $sql = "UPDATE cliente SET nombre=?,apellido=?,direccion=?,edad=? WHERE idcliente = '$this->idCliente'";
        $arrData = array($this->Nombre,$this->Apellido,$this->Direccion,$this->edad);
        $request = $this->update($sql, $arrData);
        return $request;
    }
    public function delCliente($idCliente)
    {
        $sql = "DELETE FROM cliente WHERE idcliente = '$idCliente'";
        $request = $this->delete($sql);
        return $request;
    }
}
