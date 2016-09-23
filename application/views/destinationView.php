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
		
	</script>
</head>
<body>
<nav>
	<div class="container">
		<div class="nav-wrapper">
			<ul id="nav-mobile" class="right">
				<li><a href="/travels">Home</a></li>
				<li><a href="/session/logout">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div id="tripinfo">
		<h2><?= $destination['destination'] ?> </h2>
		<ul>
			<li>Planned By: <?= $destination['name'] ?></li>
			<li>Description: <?= $destination['description'] ?></li>
			<li>Travel Date From: <?= $destination['start_date'] ?></li>
			<li>Travel Date To: <?= $destination['end_date'] ?></li>
		</ul>
	</div>
	<div id="tripusers">
		<h2> Other users joining the trip </h2>
		<ul>
			<?php foreach ($tripJoiners as $tripJoiner) { ?>
			<li><?= $tripJoiner['name'] ?></li>
			<?php } ?>
		</ul>
	</div>
</div>
</body>
</html>