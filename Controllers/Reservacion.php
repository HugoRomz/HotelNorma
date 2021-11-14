<?php 

	class Reservacion extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
         if (empty($_SESSION['login'])) {
             header('Location:'.base_url().'login');
        }
		}

		public function reservacion()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Reservación";
			$data['page_title'] = "Página de reservación";
			$data['page_name'] = "reservación";
			$data['page_functions_js'] = "functions_reservacion.js";
			$this->views->getView($this,"reservacion",$data);
			
			
		}
		
		public function getReservacion()
    {
        $data = $this->model->selectReservacion();
        for ($i=0; $i < count($data); $i++) {
          
			if ($data[$i]['status']==1) {
                $data[$i]['status'] = '<span class="badge badge-danger">Ocupado</span>';
                $data[$i]['options'] = '<div class="">
                <button class="btn btn-outline-success" id="btnModificarReservacion"  onclick="fntModificarReservacion(this);" rl="'.$data[$i]['idreserva'].'" title="Modificar">Modificar</button>
                <button class="btn btn-outline-warning" id="btnImprimirReservacion"  onclick="fntImprimirReservacion(this);" rl="'.$data[$i]['idreserva'].'" title="Imprimir">Imprimir</button>
                <button class="btn btn-outline-primary" id="btnSalidaReservacion"  onclick="fntSalidaReservacion(this);" rl="'.$data[$i]['idreserva'].'" title="Salida">Salida</button>
                </div>';
            }else {
                $data[$i]['status'] = '<span class="badge badge-success">Libre</span>';
                $data[$i]['options'] = '<div class="">
                <button class="btn btn-outline-success" id="btnIngresoReservacion"  onclick="fntIngresoReservacion(this);" rl="'.$data[$i]['idreserva'].'" title="Ingreso">Ingreso</button>
                </div>';
            }
			
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

	}
 ?>