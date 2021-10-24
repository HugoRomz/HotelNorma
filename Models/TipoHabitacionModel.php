<?php

class tipoHabitacionModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function insertTipoHabitacion(String $strConcepto)
    {
        $query_insert = "INSERT INTO tipohabitacion(Concepto) VALUES(?)";
        $arrData = array($strConcepto);
        $request_insert = $this->insert($query_insert,$arrData);
        return $request_insert;
    }
    
    public function selectTipoHabitacion()
    {
        $sql = "SELECT * FROM tipohabitacion";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectIdTipoHabitacion($id)
    {
        $sql = "SELECT * FROM tipohabitacion WHERE idTipoHabitacion = $id";
        $request = $this->select($sql);
        return $request;
    }
    public function updateTipoHabitacion(string $strConcepto,int $idTipoHabitacion)
    {
        $this->IdHabitacion = $idTipoHabitacion;
        $this->Concepto = $strConcepto;
        
        $sql = "UPDATE tipoHabitacion SET Concepto = ? WHERE idTipoHabitacion = $this->IdHabitacion";
        $arrData = array($this->Concepto);
        $request = $this->update($sql,$arrData);
        return $request;
    }

    
    public function delTipoHabitacion($id)
    {
        $sql = "DELETE FROM tipohabitacion WHERE idTipoHabitacion = $id";
        $request = $this->delete($sql);
        return $request;
    }

}

?>
