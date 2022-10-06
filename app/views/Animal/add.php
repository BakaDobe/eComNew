<html>
<head><title>some title</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<!--add the owner details on top here-->
<?php $this->view('Owner/detailsPartial', $data['owner']); ?>

<h1>New Pet Information</h1>
<form action='' method='post' enctype="">
	<label>Name:<input name='name' type='text' /></label><br>
	<label>Date of Birth:<input name='dob' type='date' /></label><br>
	<label>Picture:<input type="file" name="profile pic"></label>
	<input type='submit' name='action' value='Add new pet' />
</form>

</body>
</html>