<?= $this->extend('layouts/base'); ?>


<?= $this->section('page_title'); ?>
	<span>Welcome: <?= ucfirst($userdata->username); ?></span>
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
				<h4>Gender: <?= ucfirst($userdata->gender); ?></h4>

			</div>

			<h4>Login Activity</h4>
			<?php if(count($login_info) > 0): ?>

				<table class="table">
					<tr>
						<th>Id</th>
						<th>Login Time</th>
						<th>Logout Time</th>
						<th>User Agent</th>
						<th>IP Address</th>
					</tr>
					<?php foreach($login_info as $key => $info): ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= date('l, M d Y h:i:s a', strtotime($info->login_time)); ?></td>
						<td><?= $info->logout_time; ?></td>
						<td><?= $info->agent ?></td>
						<td><?= $info->ip ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			<?php else: ?>
				<h4>Sorry No Login activity found!</h4>
			<?php endif; ?>
		</div>
		
	</div>
</div>






<?= $this->endSection(); ?>