<?php

namespace App\Controllers;
use Core\Controller;
use Core\Helper;
use App\Models\Users;


class HomeController extends Controller
{
	public function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
	}
	
	public function indexAction()
	{
		$user = Users::currentUser();
		$user->fname = 'Test';
		$user->save();
		$this->view->render('home/index');
	}
	
	public function testAjaxAction()
	{
		$response = [
			'success' => true,
			'data' => [
				'id' => 23,
				'name' => 'Przemo'
			]
		];
		$this->jsonResponse($response);
	}
}