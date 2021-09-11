<?php
	include 'function.php';
?>

<section class="user-profile">
	<div class="section-header center">
		<h2>Hallo, <?php echo ucfirst($session);?></h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 avatar">
				<h2>Avatar</h2>
				<?php get_avatar_image($session);?>
				<div class="upload-avatar">
					<form action="user-page.php" method="POST" enctype="multyipart/form-data">
						<input type="file" name="user-avatar-upload" id="user-avatar-upload" class="user-upload">
					</form>
				</div>
			</div>
			<div class="col-md-8 profile">
				<h2>Profile Information</h2>
				<div>
					<h6 class="float-end"><a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Profile anpassen</a></h6>
					<div class="profile-info"><?php get_profile_info($session);?></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="upload-image">
	<div class="section-header center">
		<h2>Neues Bild hochladen</h2>
	</div>
	<div class="container">
		<form method="POST" enctype="multyipart/form-data" name="upload-image">
			<input type="file" name="new-image" id="new-image" class="user-upload">
		</form>
	</div>
	
</section>

<section class="user-gallery">
	<div class="section-header center">
		<h2>Ihre Bildergalerie</h2>
	</div>
	<div class="container">
		<div class="row">
			<div id="user-uploaded-pics">
				<?php get_user_uploaded_pics($session); ?>
			</div>
		</div>
	</div>
</section>
