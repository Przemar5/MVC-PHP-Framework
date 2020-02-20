<?php


class Register extends Controller
{
	public function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
		
		$this->load_model('Users');
		$this->view->setLayout('default');
	}
	
	public function loginAction()
	{
		$validation = new Validate;
		
		if ($_POST)
		{
			// Form validation
			$validation->check($_POST, [
				'username' => [
					'display' => 'Username',
					'required' => true
				],
				'password' => [
					'display' => 'Password',
					'required' => true,
					'min' => 6
				]
			]);
			
			if ($validation->passed())
			{
				$user = $this->UsersModel->findByUsername($_POST['username']);
				
				if ($user && password_verify(Input::get('password'), $user->password) /* Input::get('password') == $user->password*/)
				{
					$remember = (isset($_POST['remember_me']) && Input::get('remember_me'))
						? true : false;
					$this->UsersModel->login($remember, $user->id);
//					$user->login($remember, $user->id);
					
					Router::redirect('');
				}
				else 
				{
					$validation->addError('There is an error with your username or password.');
				}
			}
		}
		
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('register/login');
	}
	
	public function logoutAction()
	{
		if (currentUser())
		{
			currentUser()->logout();
		}
		
		Router::redirect('register/login');
	}
	
	public function registerAction()
	{
		$validation = new Validate;
		$posted_values = [
			'fname' => '',
			'lname' => '',
			'username' => '',
			'email' => '',
			'password' => '',
			'confirm' => '',
		];
		
		if ($_POST)
		{
			$posted_values = posted_values($_POST);
			$validation->check($_POST, [
				'fname' => [
					'display' => 'First name',
					'required' => true
				],
				'lname' => [
					'display' => 'Last name',
					'required' => true
				],
				'email' => [
					'display' => 'Email',
					'required' => true,
					'unique' => 'users',
					'max' => 150,
					'valid_mail' => true
				],
				'username' => [
					'display' => 'Username',
					'required' => true,
					'unique' => 'users',
					'min' => 6,
					'max' => 150
				],
				'password' => [
					'display' => 'Password',
					'required' => true,
					'min' => 6
				],
				'confirm' => [
					'display' => 'Confirm password',
					'required' => true,
					'matches' => 'password'
				]
			]);
			
			if ($validation->passed())
			{
				$newUser = new Users;
				$newUser->registerNewUser($_POST);
//				$newUser->login();

				Router::redirect('register/login');
			}
		}
		$this->view->post = $posted_values;
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('register/register');
	}
}