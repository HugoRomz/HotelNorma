<?php

class ReservacionModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    // public function insertHabitacion(int $idHabitacion,String $strTipoHabitacion,String $strPrecio,int $NumeroPiso,int $NumeroPersonas,String $CaracteristicaHabitacion)
    // {
    //     $status = 'ocupado';
    //     $query_insert = "INSERT INTO habitacion (no_habitacion,tipo,precio,no_piso,no_personas,status,caracteristica) VALUES(?,?,?,?,?,?,?)";
    //     $arrData = array($idHabitacion,$strTipoHabitacion,$strPrecio,$NumeroPiso,$NumeroPersonas,$status,$CaracteristicaHabitacion);
    //     $request_insert = $this->insert($query_insert, $arrData);
    //     return $request_insert;
    // }

    public function selectReservacion()
    {
        $sql = "SELECT reservacion.*,habitacion.status FROM reservacion,habitacion WHERE reservacion.no_habitacion = habitacion.no_habitacion;";
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
