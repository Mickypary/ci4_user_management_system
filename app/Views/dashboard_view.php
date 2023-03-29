<?= $this->extend('layouts/base'); ?>


<?= $this->section('page_title'); ?>
	<span>Welcome <?= ucfirst($userdata->username); ?></span>
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
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
			</div>
		</div>
		
	</div>
</div>






<?= $this->endSection(); ?>