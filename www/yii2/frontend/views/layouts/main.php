<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
	<head>
		<title>Epulari</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="description" content="">
		<meta name="keywords" content="">

		<link href="/css/style.css" rel="stylesheet" type="text/css">
		<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
		<link href="/css/style1.css" rel="stylesheet" type="text/css">
		<link href="/css/style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">

		<!--link rel="shortcut icon" href="/favicon.ico"-->

	</head>
	<body>
		<div class="container">
			<?= $this->render ('//_partials/user_header'); ?>
			<?= $content ?>
			<?= $this->render ('//_partials/footer'); ?>
		</div>

		
		<!-- scripts begin -->
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

		<script type="text/javascript" src="/js/bootstrap.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
		<script type="text/javascript" src="/js/smartcore.js"></script>
		<script type="text/javascript" src="/js/smartcore.users.js"></script>
		<script type="text/javascript" src="/js/smartcore.events.js"></script>
		<script type="text/javascript" src="/js/smartcore.services.js"></script>

		<script>$(SmartCore.main);</script>
	</body>
</html>