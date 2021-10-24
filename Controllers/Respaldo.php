<?php 

	class Respaldo extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
         if (empty($_SESSION['login'])) {
             header('Location:'.base_url().'login');
        }
		}

		public function respaldo()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Respaldo";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "respaldo";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"respaldo",$data);
		}

	}
 ?>