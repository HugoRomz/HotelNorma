<?php 

	class Home extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
         if (empty($_SESSION['login'])) {
             header('Location:'.base_url().'login');
        }
		}

		public function home()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Dashboard";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$data['page_functions_js'] = "functions_home.js";
			$this->views->getView($this,"home",$data);
			
			
		}
		public function getCountOcupadoHabitacion()
        {
            $data = $this->model->selectCountOcupadoHabitacion();
			echo json_encode($data);
            die();
        }
		public function getCountLibreHabitacion()
        {
            $data = $this->model->selectCountLibreHabitacion();
			echo json_encode($data);
            die();
        }
		public function getCountClientes()
        {
            $data = $this->model->selectCountClientes();
			echo json_encode($data);
            die();
        }
		public function getCountReportes()
        {
            $data = $this->model->selectCountReportes();
			echo json_encode($data);
            die();
        }

	}
 ?>