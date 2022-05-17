<?php

class UserController
{
	// вхід
	function actionLogin()
	{
		$user = new User();

		// провірка на автентифікацію	
		if(!isset($_SESSION['user']['login']))
		{
			// відправка форми
			if(isset($_POST['log']) or isset($_POST['reg']))
			{
				// автентифікація
				if(isset($_POST['log']))
					$errors = $user->userLogin();
				// реєстрація
				elseif(isset($_POST['reg']))
					$errors = $user->userReg();
			} else // сторінка входу 
			{
				require_once ROOT . '/views/login.php';
				
				return;
			}

			// помилка входу
			if($errors)
				require_once ROOT . '/views/login.php';
			// особовий кабінет
			else
				header("Location: /user/");
		} else // особовий кабінет
			header("Location: /user/");
	}

	// вихід
	function actionLogout()
	{
		$user = new User();
		
		// провірка на автентифікацію	
		if(isset($_SESSION['user']))
		{
			$user->userLogout();

			header('Location: /login/');
		}
		else
			header("Location: ". $_SERVER['HTTP_REFERER'] ."");
	}

	function actionUser()
	{
		if(isset($_SESSION['user']['login']))
		{
			if($_SESSION['user']['is_admin'])
				echo 'adminpanel';
			else
				echo 'user account';
		} else
		{
			header("Location: ". $_SERVER['HTTP_REFERER'] ."");
		}
	}
}