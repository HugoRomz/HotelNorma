<?php  

class tipoHabitacion extends Controllers{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location:'.base_url().'login');
        }
    }

    public function tipoHabitacion(){
        $data['page_id'] = 4;
        $data['page_tag'] = "Tipo de Habitación";
        $data['page_tittle'] = "Tipo de Habitación - <small> Hotel Norma</small>";
        $data['page_name'] = "tipo _de _habitación";    
        $data['page_functions_js'] = "functions_tipoHabitacion.js";
        $this->views->getView($this,"tipoHabitacion",$data);
        
    }
    public function getTipoHabitacion()
    {
        $data = $this->model->selectTipoHabitacion();
        for ($i=0; $i < count($data); $i++) { 
           
            $data[$i]['options'] = '<div class="">
            <button class="btn btn-dark" id="btnEditTipoHabitacion" onclick="fntEditTipoHabitacion(this);" rl="'.$data[$i]['idTipoHabitacion'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-primary" id="btnDelTipoHabitacion" onclick="fntDelTipoHabitacion(this);"rl="'.$data[$i]['idTipoHabitacion'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function getSelectTipoHabitacion()
    {
        $htmlOptions = "";
        $data = $this->model->selectTipoHabitacion();
        if (count($data)>0) {
            for ($i=0; $i < count($data); $i++) { 
           
                $htmlOptions .='<option value="'.$data[$i]['idTipoHabitacion'].'">'.$data[$i]['Concepto'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }
    public function setTipoHabitacion(){

        if (empty($_POST['inputTipoHabitacion'])) {
            $arrResponse = array ("status" => false,"msg" => 'Datos Incorrectos.');
        }else{
            $IdTipoHabitacion = intval($_POST['idTipoHabitacion']);
            $strConcepto = strClean($_POST['inputTipoHabitacion']);

            if ($IdTipoHabitacion == 0) {
                $option = 1;
                //Crear
                $request_tipoHabitacion = $this->model->insertTipoHabitacion($strConcepto);
            }else {
                //Actualizar
                $request_tipoHabitacion = $this->model->updateTipoHabitacion($strConcepto,$IdTipoHabitacion);
                $option=2;
            }
       
        if($request_tipoHabitacion > 0 )
        {
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
            }
        }else if($request_tipoHabitacion == 'exist'){
            
            $arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
        }else{
            $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getIdTipoHabitacion(int $idTipoHabitacion)
    {
        $intIdTipoHabitacion = intval(strClean($idTipoHabitacion));
        if ($intIdTipoHabitacion > 0) {
            $arrData = $this->model->selectIdTipoHabitacion($intIdTipoHabitacion);
            if (empty($arrData)) {
                $arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
            }else {
                $arrResponse = array('status'=>true,'data'=>$arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delTipoHabitacion()
    {
        if ($_POST) {
            $intIdTipoHabitacion = intval($_POST['idTipoHabitacion']);
            $requestDelete = $this->model->delTipoHabitacion($intIdTipoHabitacion);
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