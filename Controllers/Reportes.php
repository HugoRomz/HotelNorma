<?php 

	class Reportes extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
         if (empty($_SESSION['login'])) {
             header('Location:'.base_url().'login');
        }
		}

		public function reportes()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Reportes";
			$data['page_title'] = "Página de reportes";
			$data['page_name'] = "reportes";
			$data['page_functions_js'] = "functions_reportes.js";
			$this->views->getView($this,"reportes",$data);
			
			
		}
		
		public function getReportes()
    {
        $data = $this->model->selectReportes();
        
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

	public function imprimirReporte(String $idreserva)
    {

		$idreserva = strClean($idreserva);
        if ($idreserva > 0) {
            $arrData = $this->model->selectIdPago($idreserva);
            if (empty($arrData)) {
                $arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
            }else {
                $arrResponse = array('status'=>true,'data'=>$arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();



        die();
    }

	}


 ?>