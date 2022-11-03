<html>
<head><title>User account</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<?php
	if(isset($_GET['error'])){ ?>
		<div class="alert alert-danger" role="alert">
			<?= $_GET['error'] ?>
		</div>
	<?php }
?>

<?php
	if(isset($_GET['success'])){ ?>
		<div class="alert alert-success" role="alert">
			<?= $_GET['success'] ?>
		</div>
	<?php }
?>

<a href="/User/setup2fa">Set up 2-factor authentication</a>

<h1>Modify your password</h1>
<form action='' method='post'>
	<label>Old Password:<input name='old_password' type='password' /></label><br>
	<label>New Password:<input name='new_password' type='password' /></label><br>
	<label>New Password Confirmation:<input name='new_password_confirmation' type='password' /></label><br>
	<input type='submit' name='action' value='Set New Password' />
</form>
<a href="/User/logout">logout</a>
</body>
</html>