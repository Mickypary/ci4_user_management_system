<?= $this->extend('layouts/base'); ?>

<?php $session = \Config\Services::session(); ?> 


<?= $this->section('content'); ?>

<div class="container">
	<div class="row justify-content-center align-items-center">
		<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6">
			<h1>Register</h1>

			<?php if($session->getTempdata('success')): ?>
				<div id="hidemsg" class="alert alert-success"><?= $session->getTempdata('success'); ?></div>
			<?php endif; ?>

			<?php if($session->getTempdata('error')): ?>
				<div id="hidemsg" class="alert alert-danger"><?= $session->getTempdata('error'); ?></div>
			<?php endif; ?>

			<?= form_open(); ?>

			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username" value="<?= set_value('username'); ?>">
				<span class="text-danger"><?= display_error($errors, "username"); ?></span>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" value="<?= set_value('email'); ?>">
				<span class="text-danger"><?= display_error($errors, "email"); ?></span>
			</div>
			<div class="form-group">
				<label>Mobile</label>
				<input class="form-control" type="text" name="mob" value="<?= set_value('mob'); ?>">
				<span class="text-danger"><?= display_error($errors, "mob"); ?></span>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<select name="gender" class="form-control">
					<option value="">-- select --</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="password" name="pass">
				<span class="text-danger"><?= display_error($errors, "pass"); ?></span>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input class="form-control" type="password" name="cpass">
				<span class="text-danger"><?= display_error($errors, "cpass"); ?></span>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="register" value="Register">
			</div>



			<?= form_close(); ?>
		</div>
	</div>
</div>



<?= $this->endSection(); ?>