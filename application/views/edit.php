<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Appointmnet</title>
</head>
<body>
	<?php foreach ($appointmentList as $editing) { 
		?>
		
		<form action="/appointments/update/<?php echo $editing['id']; ?>" method="post">
			<p>Tasks:</p>
			<input type="text" name="tasks"value="<?php echo$editing['tasks']; ?>">
			<p>Status:
			<input type="text" name="status"><?php echo $editing['status']; ?></input>
			</p>
			<p>Date:
			<input type="date" name="date" value=" <?php echo $editing['date']; ?>">
			</p>
			<p>Time:
			<input type="time" name="time" value=" <?php echo $editing['time']; ?>">
			</p>
			<input type="submit" value="Update">
		</form>
		<?php

	}
	?>
</body>
</html>