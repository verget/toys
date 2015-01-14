
<html>
<head>
	<title>Авторизация</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/dashboard.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="/css/style.css">
	
	<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container auth">
		<form action="/admin/login" role="form" class="form-login" method="post">
			<h2 class="form-login-heading" style="text-align: center;">Войти</h2>
			<input type="text" name="username" autofocus="" required="" placeholder="Имя пользователя" class="form-control" />
			<br />
			<input type="password" name="password" required="" placeholder="Пароль" class="form-control" />
			<br />
			<button type="submit" class="btn btn-lg btn-primary btn-block">Вход</button>
		</form>
	</div>
	<!-- /container -->	
</body>
</html>