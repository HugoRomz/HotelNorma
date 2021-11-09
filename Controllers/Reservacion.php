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
			$data['page_title'] = "Página reservación";
			$data['page_name'] = "reservación";
			$data['page_functions_js'] = "functions_reservacion.js";
			$this->views->getView($this,"reservacion",$data);
			
			
		}
	

	}
 ?>