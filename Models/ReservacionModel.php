<?php

class ReservacionModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    public function insertPago(int $intIdPago,String $strConcepto,String $Dias ,String $strFechaSalida,int $total,String $strSelectCliente,int $strHabitacion)
    {
        $query_insert = "INSERT INTO pago (idpago,concepto,dias,fecha_salida,total,idcliente,no_habitacion) VALUES(?,?,?,?,?,?,?)";
        $arrData = array($intIdPago,$strConcepto,$Dias,$strFechaSalida,$total,$strSelectCliente,$strHabitacion);
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
    

    // public function delHabitacion($id)
    // {
    //     $sql = "DELETE FROM habitacion WHERE no_habitacion = $id";
    //     $request = $this->delete($sql);
    //     return $request;
    // }
}