<?php

class ReportesModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }
   

    public function selectReportes()
    {
        $sql = "SELECT * FROM pago";

        $request = $this->select_all($sql);
        return $request;
    }
    public function selectIdPago($id)
    {
        
        $sql = "SELECT pago.*,cliente.nombre FROM pago,cliente where pago.idcliente = cliente.idcliente and idreserva = '$id'";
        $request = $this->select($sql);
        return $request;
    }


}