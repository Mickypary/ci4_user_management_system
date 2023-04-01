<?= $this->extend('layouts/base'); ?>


<?= $this->section('content'); ?>

<div class="container">
	<div class="row justify-content-center align-items-center">
		<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4">
			<h1>Login</h1>

			<?php if(session()->getTempdata('error')): ?>
				<div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
			<?php endif; ?>

			<?php if(session()->getTempdata('success')): ?>
				<div class="alert alert-danger"><?= session()->getTempdata('success'); ?></div>
			<?php endif; ?>

			<?= form_open(); ?>

			<div class="form-group">
				<label>Email</label>
				<input class="form-control" type="email" name="email" value="<?= set_value('email'); ?>">
				<span class="text-danger"><?= display_error($errors, "email"); ?></span>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" type="password" name="pass" value="<?= set_value('pass'); ?>">
				<span class="text-danger"><?= display_error($errors, "pass"); ?></span>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="login" value="Login">
				<a href="">Forgot Password ?</a>
			</div>

			<?php if(isset($loginButton)): ?>
				<div class="form-group">
					<a href="<?= $loginButton; ?>"><img height="60" src="<?= base_url() ?>public/assets/images/goog.png"></a>
				</div>
			<?php endif; ?>

			<div class="form-group">
				<a class="" href=""><img height="40" src="<?= base_url() ?>public/assets/images/fb.png"></a>
			</div>

			




			<?= form_close(); ?>
		</div>
	</div>
</div>



<?= $this->endSection(); ?>