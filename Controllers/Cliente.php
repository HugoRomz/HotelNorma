<?php  

class Cliente extends Controllers{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
            header('Location:'.base_url().'login');
        }
    }

    public function Cliente(){
        $data['page_id'] = 4;
        $data['page_tag'] = "Cliente";
        $data['page_tittle'] = "Cliente - <small> Hotel Norma</small>";
        $data['page_name'] = "Cliente";    
        $data['page_functions_js'] = "functions_Cliente.js";
        $this->views->getView($this,"Cliente",$data);
        
    }
    public function getCliente()
    {
        $data = $this->model->selectCliente();
        for ($i=0; $i < count($data); $i++) {
           
            $data[$i]['options'] = '<div class="">
            <button class="btn btn-dark" id="btnEditCliente"  onclick="fntEditCliente(this);" rl="'.$data[$i]['idcliente'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-primary" id="btnDelCliente" onclick="fntDelCliente(this);"rl="'.$data[$i]['idcliente'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
    public function setCliente(){

            $idCliente = strClean($_POST['idCliente']);
            $NombreCliente = strClean($_POST['inputNombreCliente']);
            $ApellidoCliente = strClean($_POST['inputApellidoCliente']);
            $DireccionCliente = strClean($_POST['inputDireccionCliente']);
            $EdadCliente= intval($_POST['inputEdadCliente']);


            if ($idCliente == '') {
                $option = 1;
                $idCliente = idCliente();
                //Crear
                $request_Cliente = $this->model->insertCliente($idCliente,$NombreCliente,$ApellidoCliente,$DireccionCliente,$EdadCliente);
             }else {
                //Actualizar
                $request_Cliente = $this->model->updateCliente($idCliente,$NombreCliente,$ApellidoCliente,$DireccionCliente,$EdadCliente);
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

    public function getIdCliente(string $idCliente)
    {
        $IdCliente = strClean($idCliente);
        if ($IdCliente > 0) {
            $arrData = $this->model->selectIdCliente($IdCliente);
            if (empty($arrData)) {
                $arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
            }else {
                $arrResponse = array('status'=>true,'data'=>$arrData);
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delCliente()
    {
        if ($_POST) {
            $IdCliente =$_POST['idCliente'];
            $requestDelete = $this->model->delCliente($IdCliente);
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