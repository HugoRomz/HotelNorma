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
                <button class="btn btn-outline-success" id="btnIngresoReservacion"  onclick="fntIngresoReservacion(this);" precio="'.$data[$i]['precio'].'" rl="'.$data[$i]['idreserva'].'"  title="Ingreso">Ingreso</button>
                </div>';
            }
			
            if ($data[$i]['no_habitacion']==401) {
                $data[$i]['options'] = '<div class="">
                <button class="btn btn-outline-success" id="btnIngresoReservacion"  onclick="fntIngresoReservacion(this);" rl="'.$data[$i]['idreserva'].'" title="Ingreso" disabled>Ingreso</button>
                </div>';
            }
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function getSelectTipoCliente()
    {
        $htmlOptions = "";
        $data = $this->model->SelectTipoCliente();
        if (count($data)>0) {
            for ($i=0; $i < count($data); $i++) { 
           
                $htmlOptions .='<option value="'.$data[$i]['idcliente'].'">'.$data[$i]['nombre'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function setReservacion()
    {
            $intIdPago = idPago();
            $intPrecioHabitacion = intval($PrecioHabitacion);
            $strSelectCliente = strClean($_POST['selectCliente']);
            $intNumeroDias= intval($_POST['inputNumeroDias']);
            $strFechaEntrada = strClean($_POST['inputfechaEntrada']);
            $strFechaSalida = strClean($_POST['inputfechaSalida']);
            $strConcepto= strClean($_POST['inputConcepto']);

            $total = 900*$intNumeroDias;
        

            if ($id == 0) {
                $option = 1;
                //Crear
                $request_Pago = $this->model->insertPago($intIdPago,$strConcepto,$strFechaSalida,$total,$intNumeroDias,$strSelectCliente);
             }else {
                //Actualizar
                $request_Habitacion = $this->model->updateHabitacion($id,$IdHabitacion,$strTipoHabitacion,$strPrecio,$NumeroPiso,$NumeroPersona,$CaracteristicaHabitacion);
                $option=2;
            }
      
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => '1');

            }else if($option==2){
                $arrResponse = array('status' => true, 'msg' => '2');
            }
        
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

	}
 ?>