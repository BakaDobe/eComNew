<html>
<head><title>some title</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<h1>Owner details</h1>
<?php $this->view('Owner/detailsPartial', $data['owner']);?>

<h1>Pet Details</h1>
<dl>
	<dt>Name:</dt>
	<dd><?= $data['animal']->name ?></dd>

	<dt>Date of Birth:</dt>
	<dd><?= $data['animal']->dob ?></dd>

	<dt>Country of origin:</dt>
	<dd><?= $data['animal']->nicename ?></dd>
</dl>

<a href='/Animal/index/<? $data['owner']->owner_id?>'>Back to index</a>
</body>
</html>