<?php 
/**
* Controller
**/
class Controller{
	
	public $request;  				// Objet Request 
	private $vars     = array();	// Variables à passer à la vue
	public $layout    = 'pages';  // Layout à utiliser pour rendre la vue
	private $rendered = false;		// Si le rendu a été fait ou pas ?

	/**
	* Constructeur
	* @param $request Objet request de notre application
	**/
	function __construct($request){
		$this->request = $request; 	// On stock la request dans l'instance

        if($this->request->controller == 'Login' || $this->request->controller == 'login' )
		{
			$this->layout = 'login';
		}
		
		if($this->request->controller == 'Search' || $this->request->controller == 'search' )
		{
			$this->layout = 'search';
		}
		
		/*
			You can use this function to compare the case sensitivity between 2 strings : strcasecmp
		*/
		
		if($this->request->controller == 'Recipient' || $this->request->controller == 'recipient' )
		{

			$this->layout = 'recipient';
		}

		if($this->request->controller == 'Popup' || $this->request->controller == 'popup' )
		{

			$this->layout = 'popup';
		}
		if($this->request->controller == 'Pages' || $this->request->controller == 'pages' )
		{

			$this->layout = 'pages';
		}	
		if($this->request->controller == 'Affiliation' || $this->request->controller == 'affiliation' )
		{

			$this->layout = 'affiliation';
		}
		
		if($this->request->controller == 'Receptionba' || $this->request->controller == 'receptionba' )
		{

			$this->layout = 'receptionba';
		}		
		if($this->request->controller == 'coupon_fid' || $this->request->controller == 'Coupon_fid' )
		{

			$this->layout = 'coupon_fid';
		}
		
		if($this->request->controller == 'renonciation' || $this->request->controller == 'Renonciation' )
		{

			$this->layout = 'renonciation';
		}
		if($this->request->controller == 'Coupon_prospect' || $this->request->controller == 'coupon_prospect' )
		{

			$this->layout = 'coupon_prospect';
		}
		
		if($this->request->controller == 'Bordereaux' || $this->request->controller == 'bordereaux' )
		{

			$this->layout = 'bordereaux';
		}
		
		if($this->request->controller == 'dqe' || $this->request->controller == 'Dqe' ){

			$this->layout = 'dqe';
		}
	}


	/**
	* Permet de rendre une vue
	* @param $view Fichier à rendre (chemin depuis view ou nom de la vue) 
	**/
	public function render($view){


		if($this->rendered){ return false; }
		extract($this->vars); 
				
		if(strpos($view,'/')===0){
			$view = ROOT.DS.'view'.$view.'.php';
		}else{
			$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
		}
		ob_start();
		require($view);
		$content_for_layout = ob_get_clean();  

		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
		
		$this->rendered = true; 
	}


	/**
	* Permet de passer une ou plusieurs variable à la vue
	* @param $key nom de la variable OU tableau de variables
	* @param $value Valeur de la variable
	**/
	public function set($key,$value=null){
		if(is_array($key)){
			$this->vars += $key; 
		}else{
			$this->vars[$key] = $value; 
		}
	}
	
	
	/**
	* Permet de charger un model
	**/
	function loadModel($name){
		if(!isset($this->$name)){
			$file = ROOT.DS.'model'.DS.$name.'.php'; 
			require_once($file);
			$this->$name = new $name();
		}

	}
	
	/**
	* Redirect
	**/
	function redirect($url,$code = null ){
		if($code == 301){
			header("HTTP/1.1 301 Moved Permanently");
		}
		header("Location: ".Router::url($url)); 
	}
	
}
?>