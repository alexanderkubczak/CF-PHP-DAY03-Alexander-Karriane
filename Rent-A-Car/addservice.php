<!DOCTYPE html>
<html>
<head>
		<title>Add a new employee</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Rent-A-Car.css">
<?php 
include "nav.php";
?>
</head>
<body>

	<div className="centered">

<h1> Add new service to database </h1>

<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Description</label>
    <input type="text" class="form-control" placeholder="Characteristics...">
    <select class="form-control">
  <option>With customer</option>
  <option>Not with customer</option>
</select>
<select class="form-control">
  <option>Location1</option>
  <option>Location2</option>
  <option>Location3</option>
</select>
  </div>

      <button class="btn btn-primary" type="submit">Submit form</button>

  </div>
  </div>

</form>




</form>
</div>

</body>
</html>