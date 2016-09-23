<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>
	<!-- Google Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Jquery Theme -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/hot-sneaks/jquery-ui.css">
	<!-- Materialize CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
	<!-- Personal CSS -->
	<link rel="stylesheet" href="/assets/css/style.css">


	<!-- Less -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.min.js"></script>


	<!-- Jquery --> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <!-- Materialize JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#start_date').datepicker();
			$('#end_date').datepicker();
		})
	</script>
</head>
<body>
<nav>
	<div class="container">
		<div class="nav-wrapper">
			<ul id="nav-mobile" class="right">
				<li><a href="/travels">Home</a></li>
				<li><a href="/welcome/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<h2> Add a Trip</h2>
	<form action="/travels/addTrip" method="POST">
		<input type="hidden" name="creator_id" value=<?= $this->session->id ?>>
		<div class="input-field">
			<input type="text" name="destination" id="destination">
			<label for="destination">Destination</label>
		</div>
		<div class="input-field">
			<input type="text" name="description" id="description">
			<label for="description">Description</label>
		</div>
		<div class="input-field">
			<input type="text" name="start_date" id="start_date">
			<label for="start_date">Travel Date From</label>
		</div>
		<div class="input-field">
			<input type="text" name="end_date" id="end_date">
			<label for="end_date">Travel Date To:</label>
		</div>
		<button class="btn waves-effect waves-light center-align" type="submit">Add</button>
		<?php 
			$errors = $this->session->flashdata('errors');
			if ($errors) {
				foreach ($errors as $error) { ?>

			<p><?= $error ?></p>
			<?php }; 
			}; ?>

	</form>
</div>
</body>
</html>