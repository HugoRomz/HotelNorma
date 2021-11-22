<?php 

	class homeModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	


		public function selectCountOcupadoHabitacion()
    {
        $sql = "SELECT COUNT(status)AS numeroH FROM habitacion WHERE status=1";
        $request = $this->select_all($sql);
        return $request;
    }
	public function selectCountLibreHabitacion()
    {
        $sql = "SELECT COUNT(status)AS numeroH FROM habitacion WHERE status=0";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectCountClientes()
    {
        $sql = "SELECT COUNT(idcliente)AS numeroH FROM cliente";
        $request = $this->select_all($sql);
        return $request;
    }
    public function selectCountReportes()
    {
        $sql = "SELECT COUNT(idpago)AS numeroH FROM pago";
        $request = $this->select_all($sql);
        return $request;
    }
	}


	
 ?>