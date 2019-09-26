<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign up</title>
	</head>
	<body>
		<div>
			<h2>Sign Up</h2>
			<p>Please fill this form to create an account.</p>
			<form action="sign_up.php" id="sign_up" method="post">
				<label>Username</label>
				<input type="text" name="username" value="">
				<label>Email</label>
				<input type="email" name="email" value="">
				<label>Password</label>
				<input type="password" name="password" value="">
				<label>Confirm Password</label>
				<input type="password" name="password_confirmation" value="">
				<input type="submit" value="Submit">
			</form>

			<h2>Sign In</h2>
			<p>Please fill this form to create an account.</p>
			<form action="sign_in.php" id="sign_in" method="post">
				<label>Email</label>
				<input type="email" name="email" value="">
				<label>Password</label>
				<input type="password" name="password" value="">
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>