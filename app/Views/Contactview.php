<?= $this->extend('layouts/base'); ?>

<?php
	$page_session = \Config\Services::session();
?>

<?= $this->section('content'); ?>

<script type="text/javascript">
	setTimeout(function() {
		$("#hidemsg").hide();
	}, 3000)
</script>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Contact Us</h1>

			<?php if($page_session->getTempdata('success')): ?>
				<div id="hidemsg" class="alert alert-info"><?= $page_session->getTempdata('success'); ?></div>
			<?php endif; ?>

			<?php if($page_session->getTempdata('error')): ?>
				<div id="hidemsg" class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
			<?php endif; ?>


			<?= form_open(); ?>

			<div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="uname" value="<?= set_value('uname'); ?>">
				<span class="text-danger"><?= display_error($errors, "uname"); ?></span>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" value="<?= set_value('email'); ?>">
				<span class="text-danger"><?= display_error($errors, "email"); ?></span>
			</div>
			<div class="form-group">
				<label>Mobile</label>
				<input class="form-control" type="text" name="mobile" value="<?= set_value('mobile'); ?>">
				<span class="text-danger"><?= display_error($errors, "mobile"); ?></span>
			</div>
			<div class="form-group">
				<label>Message</label>
				<textarea name="msg" class="form-control"><?= set_value('msg') ?></textarea>
				<span class="text-danger"><?= display_error($errors, "msg"); ?></span>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="save" value="Send">
			</div>



			<?= form_close(); ?>
		</div>
	</div>
</div>



<?= $this->endSection(); ?>