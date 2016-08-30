<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Whats's Up</title>
	<style type="text/css">
		#add{ width: 300px; display: inline-block;}
		label{display:inline-block; width: 130px;} 

		h1{width:700px; display: inline-block;}
		.right{float: right;}
		a{text-decoration: none; margin-top: 20px;}
		table {
			width: 800px;
			margin: 20px 50px 0 50px;
			border-collapse: collapse;
			border:1px solid black;
		}
		table, th, td {
			border-right: 1px solid black;
			height: 30px;
			padding-left: 5px;
			margin-bottom: 20px;
		}
		th {background: #CCC}
		tr:nth-child(even) {background: #EAEAEA}
		tr:nth-child(odd) {background: #FFF}
	</style>
</head>
<body>
	<header>
		<h1>Hello, <?php echo  $name;?> !</h1>
		<a class="right" href="/users/logout">Logout</a>
	</header>
	<main>
		<h4>Here are your appointments for today, <?php echo date("Y/m/d");  ?></h4>
		<table>
			<tr>
				<th>Tasks</th>
				<th>Time</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php foreach ($todays as $appointment) {

				?>
				<tr>
					<td><?=$appointment['tasks']?></td>
					<td><?=$appointment['time']?></td>
					<td><?=$appointment['status']?></td>
					<td><a href="/appointments/edit/<?=$appointment['id']?>">Edit</a>
					<a href="/appointments/delete/<?=$appointment['id']?>">Delete</a>
					
				</td>
			</tr>
			<?php
		} 
		?>
	</table>
	<hr>
	<h4>Your other appointments::</h4>
	<table>
		<tr>
			<th>Tasks</th>
			<th>Date</th>
			<th>Time</th>
		</tr>
		<tr class="for_border">
			<td>Taylor Swift Concert</td>
			<td>June 12</td>
			<td>20:00</td>
		</tr>
		<?php foreach ($all as $appointment) {

			?>
			<tr>
				<td><?=$appointment['tasks']?></td>
				<td><?=$appointment['date']?></td>
				<td><?=$appointment['time']?></td>
			</tr>
			<?php
		} 
		?>
	</table>
</main>
<footer>
	<h4></h4>
	<form action="/appointments/create" method="post" id="add">
		<fieldset>
			<legend>Add Appointment</legend>
			<p>
				<label for="time">Time:</label>
				<input type="time" name="time">
			</p>
			<p>
				<label for="date">Date:</label>
				<input type="date" name="date" min="<?php echo date("Y-m-d"); ?>" ></input>
			</p>
			<p>
				<label for="tasks">Tasks:</label>
				<input type="text" name="tasks" id="tasks">
			</p>
			<p>
				<button type="submit" name="user_id" value="<?=$id?>">Add</button>
			</p>

		</fieldset>
	</form>
</footer>


</body>
</html>

