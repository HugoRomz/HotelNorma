<?php  

class Habitacion extends Controllers{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location:'.base_url().'login');
        }
    }

    public function Habitacion(){
        $data['page_id'] = 4;
        $data['page_tag'] = "Habitación";
        $data['page_tittle'] = "Habitación - <small> Hotel Norma</small>";
        $data['page_name'] = "habitación";    
        $data['page_functions_js'] = "functions_Habitacion.js";
        $this->views->getView($this,"Habitacion",$data);
        
    }
    public function getHabitacion()
    {
        $data = $this->model->selectHabitacion();
        for ($i=0; $i < count($data); $i++) {
            
            if ($data[$i]['status']==1) {
                $data[$i]['status'] = '<span class="badge badge-danger">Ocupado</span>';
            }else {
                $data[$i]['status'] = '<span class="badge badge-success">Libre</span>';
            }
           
            $data[$i]['options'] = '<div class="">
            <button class="btn btn-dark" id="btnEditHabitacion"  onclick="fntEditHabitacion(this);" rl="'.$data[$i]['no_habitacion'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-primary" id="btnDelHabitacion" onclick="fntDelHabitacion(this);"rl="'.$data[$i]['no_habitacion'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function setHabitacion(){
            $id = intval($_POST['id']);
            $IdHabitacion = intval($_POST['idHabitacion']);
            $strTipoHabitacion = intval($_POST['selectTipoHabitacion']);
            $strPrecio = strClean($_POST['inputPrecioHabitacion']);
            $NumeroPiso= intval($_POST['inputNumeroPiso']);
            $CaracteristicaHabitacion = strClean($_POST['inputCaracteristicaHabitacion']);

            if ($id == 0) {
                $option = 1;
                //Crear
                $request_Habitacion = $this->model->insertHabitacion($IdHabitacion,$strTipoHabitacion,$strPrecio,$NumeroPiso,$CaracteristicaHabitacion);
             }else {
                //Actualizar
                $request_Habitacion = $this->model->updateHabitacion($id,$IdHabitacion,$strTipoHabitacion,$strPrecio,$NumeroPiso,$CaracteristicaHabitacion);
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

    public function getIdHabitacion(int $idHabitacion)
    {
        $intIdHabitacion = intval(strClean($idHabitacion));
        if ($intIdHabitacion > 0) {
            $arrData = $this->model->selectIdHabitacion($intIdHabitacion);
            if (empty($arrData)) {
                $arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
            }else {
                $arrResponse = array('status'=>true,'data'=>$arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delHabitacion()
    {
        if ($_POST) {
            $intIdHabitacion = intval($_POST['idHabitacion']);
            $requestDelete = $this->model->delHabitacion($intIdHabitacion);
            if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
        }

}


?>