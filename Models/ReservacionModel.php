<?php

class ReservacionModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    public function insertPago(int $intIdPago,String $strConcepto,int $Dias ,String $strFechaSalida,int $total,String $strSelectCliente,int $strHabitacion,String $idreserva)
    {
        $query_insert = "INSERT INTO pago (idpago,concepto,dias,fecha_salida,total,idcliente,no_habitacion,idreserva) VALUES(?,?,?,?,?,?,?,?)";
        $arrData = array($intIdPago,$strConcepto,$Dias,$strFechaSalida,$total,$strSelectCliente,$strHabitacion,$idreserva);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }
    

    public function updatePago(int $intIdPago,int $Dias,String $strFechaSalida,int $pago)
    {

        $this->idpago = $intIdPago;
        $this->dias = $Dias;
        $this->fechasalida = $strFechaSalida;
        $this->pago = $pago;

        $sql = "UPDATE pago SET dias=?,fecha_salida=?,total=? WHERE idpago = $this->idpago";
        $arrData = array($this->dias,$this->fechasalida,$this->pago);
        $request = $this->update($sql, $arrData);
        return $request;
    } 
    public function updateReservaFecha(String $strReserva,String $strFechaSalida)
    {
        $this->IdReserva = $strReserva;
        $this->fechaSalida = $strFechaSalida;

        $sql = "UPDATE reservacion SET fecha_salida=? WHERE idreserva = '$this->IdReserva'";
        $arrData = array($this->fechaSalida);
        $request = $this->update($sql, $arrData);
        return $request;
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
    public function updateHabitacion(int $idHabitacion,int $status)
    {

        $this->IdHabitacion = $idHabitacion;
        $this->status = $status;

        $sql = "UPDATE habitacion SET status=? WHERE no_habitacion = $this->IdHabitacion";
        $arrData = array($this->status);
        $request = $this->update($sql, $arrData);
        return $request;
    } 
    public function updateReserva(String $strReserva,String $fechaActual,String $strFechaSalida)
    {
        $this->IdReserva = $strReserva;
        $this->fechaEntrada = $fechaActual;
        $this->fechaSalida = $strFechaSalida;

        $sql = "UPDATE reservacion SET fecha_ingreso=?,fecha_salida=? WHERE idreserva = '$this->IdReserva'";
        $arrData = array($this->fechaEntrada,$this->fechaSalida);
        $request = $this->update($sql, $arrData);
        return $request;
    }
    public function DeleteHabitacion($id)
    {
        $sql = "UPDATE reservacion SET fecha_ingreso='0000-00-00',fecha_salida='0000-00-00' WHERE no_habitacion = '$id'";
        $sql = "UPDATE habitacion SET status=0 WHERE no_habitacion = $id";
        $request = $this->select($sql);
        return $request;
    }


}