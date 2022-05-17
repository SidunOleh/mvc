<?php

// користувач
class User
{
	private $login;
	private $password;
	private $email;

	function __construct()
	{
		$this->login    = isset($_POST['login']) ? $_POST['login'] : '';
		$this->password = isset($_POST['password']) ? $_POST['password'] : '';
		$this->email    = isset($_POST['email']) ? $_POST['email'] : '';
	}

	// існування логіна
	private function checkExistLogin()
	{
		$db = Db::getDb();

		$exist = $db->query("SELECT login FROM `users` WHERE login = '". $this->login ."'");

		return $exist->fetch_assoc();
	}

	// автентифікація
	function userLogin()
	{
		$db = Db::getDb();

		$login_errors = [];

		if(!$this->checkExistLogin()) // провірка логіна 
		{
			$login_errors[]  = 'Login or password are incorrect';

			return $login_errors;
		}

		// користувач
		$user = $db->query("SELECT password, is_admin FROM `users` WHERE login = '". $this->login."'")
			->fetch_assoc();
			
		// провірка пароля
		if(!password_verify($this->password, $user['password']))
		{
			$login_errors[]  = 'Login or password are incorrect';

			return $login_errors;
		}

		// запис користувача в сесійну змінну
		$_SESSION['user']['login']    = $this->login;
		$_SESSION['user']['is_admin'] = $user['is_admin'];

		return $login_errors;
	}

	// реєстрація
	function userReg()
	{
		$db = Db::getDb();

		$reg_errors = [];

		// валідність логіна
		if(!preg_match('/[a-zA-Z0-9_]{3,}/', $this->login)) 
			$reg_errors[] = 'Invalid login';
		// унікальність логіна
		if($this->checkExistLogin()) 
			$reg_errors[]  = 'Login are not unique';
		// провірка пароля
		if(!preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[0-9a-zA-Z!@#$%^&*]{6,}/', $this->password))
			$reg_errors[]  = 'Invalid password';
		// провірка e-mail
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
			$reg_errors[]  = 'Invalid e-mail';


		if(!$reg_errors) // запис користувача в бд
		{
			$pass_hash = password_hash($this->password, PASSWORD_DEFAULT);

			$new_user = $db->query("INSERT INTO `users`(login, password, email, is_admin)
				VALUES('". $this->login ."', '". $pass_hash ."', '". $this->email ."', '0')");

			if($new_user) // успішний запис
			{	
			 	$_SESSION['user']['login']    = $this->login;
			 	$_SESSION['user']['is_admin'] = 0;
			}
			 else
				$reg_errors[] = 'Problem with database'; 
		}

		return $reg_errors;
	}

	// вихід
	function userLogout()
	{
		unset($_SESSION['user']);
	}
}