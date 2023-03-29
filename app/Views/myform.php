<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
</head>
<body>
	<?php $validation = \Config\Services::validation(); ?>
	<h1>Form Validation</h1>



	<?= form_open('users'); ?>

	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username" value="<?= set_value('username'); ?>">
				<span class="text-danger"><?= display_error($errors, "username"); ?></span>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="text" name="email" value="<?= set_value('email'); ?>">
				<span class="text-danger"><?= display_error($errors, "email"); ?></span>
			</td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td>
				<input type="text" name="mobile" value="<?= set_value('mobile'); ?>">
				<span class="text-danger"><?= display_error($errors, "mobile"); ?></span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="save" value="Save">
			</td>
		</tr>
	</table>

	<?= form_close(); ?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>