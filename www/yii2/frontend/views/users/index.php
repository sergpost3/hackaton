<?php
    /**
     * @var array $users
     */
?><h2>Список користувачів</h2>



<div class="row">
	<form action="" method="post">
		<div class="col s12 m9 l9">
			<div class="input-field">
				<input id="search" name="search" type="text">
				<label for="search">Пошук користувачів...</label>
			</div>
		</div>
		<div class="col s12 m3 l3 fix-btn">
			<button class="waves-effect red btn">Шукати</button>
		</div>
	</form>
</div>

<div class="row">

	<?php if (count ($users) > 0)
		foreach ($users as $key => $user) : ?>
		<div class="col s12 m6 l4">
			<div class="card">
				<div class="card-image">
					<a href="/users/<?= $user["link"]; ?>">
						<img src="<?= (empty ($user["image"]) ? '/images/stab.png' : $user["image"]); ?>">
					</a>
					<span class="card-title"><a href="/users/<?= $user["link"]; ?>" class="red-text accent-2"><?= $user["name"]; ?></a></span>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>