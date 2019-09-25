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
			<form action="form.php" id="sign_up" method="post">
				<label>Username</label>
				<input type="text" name="username" value="">
				<span></span>
				<label>Email</label>
				<input type="email" name="email" value="">
				<span></span>
				<label>Password</label>
				<input type="password" name="password" value="">
				<span></span>
				<label>Confirm Password</label>
				<input type="password" name="password_confirmation" value="">
				<span></span>
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>