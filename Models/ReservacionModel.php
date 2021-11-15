<?php

class ReservacionModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    public function insertPago(int $intIdPago,String $strConcepto,String $strFechaSalida,int $total,int $intNumeroDias,String $strSelectCliente)
    {
        $query_insert = "INSERT INTO pago (idpago,concepto,fecha_salida,total,no_dias,idcliente) VALUES(?,?,?,?,?,?)";
        $arrData = array($intIdPago,$strConcepto,$strFechaSalida,$total,$intNumeroDias,$strSelectCliente);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }
    

    

    public function selectReservacion()
    {
        $sql = "SELECT reservacion.*,tipohabitacion.Concepto,habitacion.status,habitacion.precio 
                 FROM reservacion,habitacion,tipohabitacion 
                 WHERE reservacion.no_habitacion = habitacion.no_habitacion 
                 AND habitacion.tipo = tipohabitacion.idTipoHabitacion;";

        $request = $this->select_all($sql);
        return $request;
    }

    public function SelectTipoCliente()
    {
        $sql = "SELECT idcliente,nombre FROM cliente";
        $request = $this->select_all($sql);
        return $request;
    }
    // public function selectIdHabitacion($id)
    // {
    //     $sql = "SELECT * FROM habitacion WHERE no_habitacion = $id";
    //     $request = $this->select($sql);
    //     return $request;
    // }
    // public function updateHabitacion(String $id,String $idHabitacion,String $strTipoHabitacion,String $strPrecio,String $NumeroPiso,String $NumeroPersona,String $CaracteristicaHabitacion)
    // {
    //     $this->id = $id;
    //     $this->IdHabitacion = $idHabitacion;
    //     $this->tipo = $strTipoHabitacion;
    //     $this->precio = $strPrecio;
    //     $this->piso = $NumeroPiso;
    //     $this->personas = $NumeroPersona;
    //     $this->caracteristica = $CaracteristicaHabitacion;

    //     $sql = "UPDATE Habitacion SET no_habitacion = ?,tipo=?,precio=?,no_piso=?,no_personas=?,caracteristica=? WHERE no_habitacion = $this->id";
    //     $arrData = array($this->IdHabitacion,$this->tipo,$this->precio,$this->piso,$this->personas,$this->caracteristica);
    //     $request = $this->update($sql, $arrData);
    //     return $request;
    // }


    // public function delHabitacion($id)
    // {
    //     $sql = "DELETE FROM habitacion WHERE no_habitacion = $id";
    //     $request = $this->delete($sql);
    //     return $request;
    // }
}