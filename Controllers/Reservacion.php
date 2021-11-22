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
                <button class="btn btn-outline-success" id="btnModificarReservacion"  onclick="fntModificarReservacion(this);" rl="'.$data[$i]['idreserva'].'"precio="'.$data[$i]['precio'].'" title="Modificar">Modificar</button>
                <button class="btn btn-outline-warning" id="btnImprimirReservacion"  onclick="fntImprimirReservacion(this);" rl="'.$data[$i]['idreserva'].'" title="Imprimir">Imprimir</button>
                <button class="btn btn-outline-primary" id="btnSalidaReservacion"  onclick="fntSalidaReservacion(this);" rl="'.$data[$i]['no_habitacion'].'" title="Salida">Salida</button>
                </div>';
            }else {
                $data[$i]['status'] = '<span class="badge badge-success">Libre</span>';
                $data[$i]['options'] = '<div class="">
                <button class="btn btn-outline-success" id="btnIngresoReservacion"  onclick="fntIngresoReservacion(this);" precio="'.$data[$i]['precio'].'" habitacion="'.$data[$i]['no_habitacion'].'"rl="'.$data[$i]['idreserva'].'"  title="Ingreso">Ingreso</button>
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
            $intIdPago1 = intval($_POST['idpago1']);
            $intPrecioHabitacion = intval($_POST['inputPrecioHabitacion']);
            $intHabitacion = intval($_POST['inputHabitacion']);
            $strSelectCliente = strClean($_POST['selectCliente']);
            $strReserva = strClean($_POST['inputReserva']);
            $Dias = intval($_POST['inputNumeroDias']);
            $strFechaSalida = strClean($_POST['inputFechaSalida']);
            $strConcepto= strClean($_POST['selectConcepto']);

            
            $total = $intPrecioHabitacion*$Dias;
            $fechaActual = date('Y-m-d');
            $status = 1;
    
            if ($intIdPago1 == 0) {
                $intIdPago = idPago();
                $option = 1;
                //Crear
                $request_Pago = $this->model->insertPago($intIdPago,$strConcepto,$Dias,$strFechaSalida,$total,$strSelectCliente,$intHabitacion,$strReserva);
             }else {
                //Actualizar

                $request_pago = $this->model->updatePago($intIdPago1,$Dias,$strFechaSalida,$total);
                $option=2;
            }

            
            if($option == 1)
            {
                $request_Habitacion = $this->model->updateHabitacion($intHabitacion,$status);
                $request_Reservacion = $this->model->updateReserva($strReserva,$fechaActual,$strFechaSalida);

                $arrResponse = array('status' => true, 'msg' => '1');

            }else if($option==2){
                $request_Reservacion = $this->model->updateReservafecha($strReserva,$strFechaSalida);
                $arrResponse = array('status' => true, 'msg' => '2');
            }
        
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }


    public function DeleteReserva(String $idReserva)
    {
        $idReserva =strClean($idReserva);
        if ($idReserva > 0) {
            $arrData = $this->model->DeleteHabitacion($idReserva);
            if (empty($arrData)) {
                $arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
            }else {
                $arrResponse = array('status'=>true,'data'=>$arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

	}


 ?>