<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multiple File Upload</title>
</head>
<body>
	<h1>Multiple File Upload</h1>
	
	<?php if(isset($validation)): ?>
		<?= $validation->listErrors(); ?>
	<?php endif; ?>

	<?= form_open_multipart(); ?>

	Upload Avatar: <input type="file" name="avatar[]" multiple>
	<input type="submit" name="" value="Upload">

	<?= form_close(); ?>
</body>
</html>