<?= $this->extend('layouts/base'); ?>


<?= $this->section('page_title'); ?>
	<?php if(session()->has('google_user')): 
		$uinfo = session()->get('google_user');
	?>
		<span>Welcome to <?= ucfirst($uinfo['first_name']); ?> <?= ucfirst($uinfo['last_name']); ?></span>
	<?php else: ?>
		<span>Welcome to <?= ucfirst($userdata->username); ?></span>
	<?php endif; ?>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(session()->has('google_user')): 
				$uinfo = session()->get('google_user');
			?>
				<div class="jumbotron">
					<img src="<?= $uinfo['profile_pic']; ?>" height="100" width="100">
					<p>Name: <?= $uinfo['first_name']; ?> <?= $uinfo['last_name']; ?></p>
					<p>Email: <?= $uinfo['email']; ?></p>
				</div>
			<?php else: ?>
			<div class="jumbotron">
				<?php if($userdata->profile_pic != ''): ?>
				<img class="rounded-circle" src="" height="60" width="60">
				<?php else: ?>
				<img class="rounded-circle" src="<?= base_url() ?>public/assets/images/avatar-male.jpg" height="60" width="60">
				<?php endif; ?>

				<br><br>
				<h4>Username <?= ucfirst($userdata->username); ?></h4>
				<h4>Mobile: <?= $userdata->mobile; ?></h4>
				<h4>Email: <?= $userdata->email; ?></h4>
				<h4>Gender: <?= ucfirst($userdata->gender); ?></h4>
			</div>
			<?php endif; ?>
		</div>
		
	</div>
</div>






<?= $this->endSection(); ?>