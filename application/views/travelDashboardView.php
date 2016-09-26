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
<div class="container">
	<nav>
		<div class="nav-wrapper">
			<ul id="nav-mobile" class="right">
				<li><a href="/travels">Home</a></li>
				<li><a href="/welcome/logout">Logout</a></li>
			</ul>
		</div>
	</nav>
	<h2> Hello, <?= $this->session->name?> </h2>
	<h5> Your Trip Schedules</h5>
	<table>
		<tr>
			<th>Destination</th>
			<th>Travel Start Date</th>
			<th>Travel End Date</th>
			<th>Plan</th>
		</tr>
		<?php foreach ($ownTrips as $ownTrip) { ?>
		<tr>
			<td><a href="travels/destination/<?= $ownTrip['id'] ?>"><?= $ownTrip['destination'] ?></a></td>
			<td><?= $ownTrip['start_date'] ?></td>
			<td><?= $ownTrip['end_date'] ?></td>
			<td><?= $ownTrip['description'] ?></td>
		</tr>
		<?php } ?>
		<?php foreach ($joinedTrips as $joinedTrip) { ?>
		<tr>
			<td><a href="travels/destination/<?= $joinedTrip['id'] ?>"><?= $joinedTrip['destination'] ?></a></td>
			<td><?= $joinedTrip['start_date'] ?></td>
			<td><?= $joinedTrip['end_date'] ?></td>
			<td><?= $joinedTrip['description'] ?></td>
		</tr>
		<?php } ?>
	</table>

	<h5> Other User's Travel Plans </h5>


	<table>
		<tr>
			<th>Name</th>
			<th>Destination</th>
			<th>Travel Start Date</th>
			<th>Travel End Date</th>
			<th>Do You Want to Join?</th>
		</tr>
		<?php foreach ($othersTrips as $otherTrip) { ?>
		<tr>
			<td><?= $otherTrip['name'] ?></td>
			<td><a href="travels/destination/<?= $otherTrip['trip_id']?>"><?= $otherTrip['destination'] ?></a></td>
			<td><?= $otherTrip['start_date'] ?></td>
			<td><?= $otherTrip['end_date'] ?></td>
			<td><a href="/travels/join/<?= $otherTrip['trip_id'] ?>">Join</a></td>
		</tr>
		<?php } ?>
	</table>
	<h3><a href="/travels/add">Add Travel Plan</a></h3>
</div>
</body>
</html>