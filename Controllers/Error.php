<?php 

	class Errors extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
        if (empty($_SESSION['login'])) {
            header('Location:'.base_url().'login');
        }
		}

		public function notFound()
		{
			$data['page_tag'] = "Error 404 - Hotel Norma";
			$data['page_tittle'] = "Error 404 - Hotel Norma";
			$data['page_name'] = "error";    
			$data['page_content'] = "";
			$this->views->getView($this,"error",$data);
		}
	}

	$notFound = new Errors();
	$notFound->notFound();
 ?>