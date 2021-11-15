<?php

class HabitacionModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


    public function insertHabitacion(int $idHabitacion,String $strTipoHabitacion,String $strPrecio,int $NumeroPiso,int $NumeroPersonas,String $CaracteristicaHabitacion)
    {
        $status = 'ocupado';
        $query_insert = "INSERT INTO habitacion (no_habitacion,tipo,precio,no_piso,no_personas,status,caracteristica) VALUES(?,?,?,?,?,?,?)";
        $arrData = array($idHabitacion,$strTipoHabitacion,$strPrecio,$NumeroPiso,$NumeroPersonas,$status,$CaracteristicaHabitacion);
        $request_insert = $this->insert($query_insert, $arrData);


        $idreserva = idReserva();

        $query_insert2 = "INSERT INTO reservacion (idreserva,no_habitacion) VALUES(?,?)";
        $arrData2 = array($idreserva,$idHabitacion);
        $request_insert2 = $this->insert($query_insert2, $arrData2);

        return $request_insert;


    }

    public function selectHabitacion()
    {
        $sql = "SELECT habitacion.no_habitacion,tipohabitacion.Concepto,habitacion.precio,habitacion.no_piso,habitacion.no_personas,habitacion.status,habitacion.caracteristica  
                FROM habitacion,tipohabitacion 
                WHERE habitacion.tipo = tipohabitacion.idTipoHabitacion;";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectIdHabitacion($id)
    {
        $sql = "SELECT * FROM habitacion WHERE no_habitacion = $id";
        $request = $this->select($sql);
        return $request;
    }
    public function updateHabitacion(String $id,String $idHabitacion,String $strTipoHabitacion,String $strPrecio,String $NumeroPiso,String $NumeroPersona,String $CaracteristicaHabitacion)
    {
        $this->id = $id;
        $this->IdHabitacion = $idHabitacion;
        $this->tipo = $strTipoHabitacion;
        $this->precio = $strPrecio;
        $this->piso = $NumeroPiso;
        $this->personas = $NumeroPersona;
        $this->caracteristica = $CaracteristicaHabitacion;

        $sql = "UPDATE Habitacion SET no_habitacion = ?,tipo=?,precio=?,no_piso=?,no_personas=?,caracteristica=? WHERE no_habitacion = $this->id";
        $arrData = array($this->IdHabitacion,$this->tipo,$this->precio,$this->piso,$this->personas,$this->caracteristica);
        $request = $this->update($sql, $arrData);
        return $request;
    }


    public function delHabitacion($id)
    {

        $sql2 = "DELETE FROM reservacion WHERE no_habitacion = $id";
        $request2 = $this->delete($sql2);

        $sql = "DELETE FROM habitacion WHERE no_habitacion = $id";
        $request = $this->delete($sql);

        return $request;
    }
}
