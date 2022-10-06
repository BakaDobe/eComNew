<html>
<head><title>Client Animal list</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
	<h1>Client information</h1>
	<?php $this->view('Owner/detailsPartial', $data['owner']);?>
<!--<p>Display details for the client/owner
	<dl>
	<dt>
		First name:
	</dt>
	<dd>
		<?= $data['owner']->first_name ?>
	</dd>
	<dt>
		Last name:
	</dt>
	<dd>
		<?= $data['owner']->last_name ?>
	</dd>
	<dt>
		Contact:
	</dt>
	<dd>
		<?= $data['owner']->contact ?>
	</dd>
</dl>-->
   <!--Display the list of animals owned by this client/owner-->
	<a href="/Animal/add/<?= $data['owner']->owner_id?>">Add a new animal</a>
	
</p>

<a href='Vet/index'>Back to the client list</a>

<a href='/Main/index'>go to Main/index</a>
</body>
</html>