<?php
    /**
     * @var string $email
     * @var string $pass
     * @var string $error
     */
?>
<h2>Авторизація</h2>

<form action="/users/signin" method="post">
	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	<div><?= (isset ($error) ? $error : '') ?></div>

	<input type="email" name="email" class="ep-dom-sign-in-email" value="<?= (isset ($email) ? $email : '') ?>">
	<input type="password" name="password" class="ep-dom-sign-in-pass" value="<?= (isset ($pass) ? $pass : '') ?>">
	<button class="ep-dom-sign-in-pass">Увійти</button>
</form>