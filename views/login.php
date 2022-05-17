<?php require_once ROOT . '/views/parts/header.php'; ?>

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->

					<?php if(isset($errors, $_POST['log'])):
						foreach($errors as $error): ?>

						<p style="color: red;">
							<?php echo $error; ?>
						</p>

					<?php endforeach; endif;?>

					<h2>Login to your account</h2>
					<form action="/login/" method="POST">
						<input name="login" type="text" placeholder="Login" 
							value="<?php echo isset($_POST['login'], $_POST['log']) ? $_POST['login'] : ''; ?>" />
						<input name="password" type="password" placeholder="Password"
							value="<?php echo isset($_POST['password'], $_POST['log']) ? $_POST['password'] : ''; ?>" />
						<button name="log" type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->

					<?php if(isset($errors, $_POST['reg'])):
						foreach($errors as $error): ?>

						<p style="color: red;">
							<?php echo $error; ?>
						</p>

					<?php endforeach; endif;?>

					<h2>New User Signup!</h2>
					<form action="/login/" method="POST">
						<input name="login" type="text" placeholder="Login"
							value="<?php echo isset($_POST['login'], $_POST['reg']) ? $_POST['login'] : ''; ?>" />
						<input name="password" type="password" placeholder="Password"
							value="<?php echo isset($_POST['password'], $_POST['reg']) ? $_POST['password'] : ''; ?>" />
						<input name="email" type="email" placeholder="Email Address"
							value="<?php echo isset($_POST['email'], $_POST['reg']) ? $_POST['email'] : ''; ?>" />
						<button name="reg" type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->

<?php require_once ROOT . '/views/parts/footer.php'; ?>	