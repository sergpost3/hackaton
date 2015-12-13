<h2>Реєстрація</h2>

<form action="/users/signup" method="post">
	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	<div><?= (isset ($error) ? $error : '') ?></div>

	<input type="email" name="email" value="<?= (isset ($email) ? $email : '') ?>" placeholder="Введіть свій email">
	<input type="password" name="pass" value="<?= (isset ($pass) ? $pass : '') ?>" placeholder="Введіть пароль">
	<input type="text" name="name" value="<?= (isset ($name) ? $name : '') ?>" placeholder="Введіть своє ім'я">

	<button class="btn btn-lg btn-success ep-dom-sign-up-pass">Зареєструватись</button>
</form>
<!--<?php if (isset ($vk_link)) { ?><a href="<?= $vk_link ?>">Sign up via Vkontakte</a><?php } ?>-->