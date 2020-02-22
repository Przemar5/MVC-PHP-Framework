<?php


class Controller extends Application
{
	protected $_controller, $_action;
	public $view, $request;
	
	public function __construct($controller, $action)
	{
		parent::__construct();
		
		$this->controller = $controller;
		$this->action = $action;
		$this->request = new Input;
		$this->view = new View;
	}
	
	protected function load_model($model)
	{
		if (class_exists($model))
		{
			$this->{$model . 'Model'} = new $model(strtolower($model));
		}
	}
}