<h2>Сторінка користувача</h2>


<div class="row">
	<?php if (isset ($user) && $user instanceof \frontend\models\Users) { ?>
		<div class="col s12 m3">
			<div class="card">
				<div class="card-image">
					<a href="#">
						<img src="<?= (empty ($user["image"]) ? '/images/stab.png' : $user["image"]); ?>">
					</a>
				</div>
			</div>
		</div>

		<div class="col s12 m8">
			<div class="card">
				<div class="card-content">
					<span class="card-title"><p class="red-text accent-2"><?= $user ['name'] ?></p></span>
					<!--span class="card-title"><p class="red-text accent-2"><?php // $user ['email'] ?></p></span-->

					<!--p class="blue-text accent-2">ÐŸÑ€Ð¾ Ñ�ÐµÐ±Ðµ</p-->


					<p></p>
				</div>
				<!--div class="card-action">
					<p class="blue-text accent-2"><?= $user ['name'] ?> буде на наступних івентах</p>

					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-image">
								<a href="#">
									<img src="img/sample.svg">
								</a>
								<span class="card-title"><a href="#" class="red-text accent-2">Name</a></span>
							</div>
							<div class="card-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo</p>
							</div>
							<div class="card-action">
								<span>Creator: </span>
								<a href="#" class="red-text accent-2">
									<strong>User1234</strong>
								</a>.
						</div>
					</div>


				</div-->
			</div>
		</div>

	<?php } else echo '<h2>404</h2>'; ?>


</div>


