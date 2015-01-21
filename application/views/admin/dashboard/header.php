<!-- Header -->
<html lang="ru">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	
	<title>Административная панель</title>
	
	<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
	
	<link rel="stylesheet" href="/css/bootstrap0.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="/css/dashboard.css">
	<link rel="stylesheet" href="/css/style.css">
	
	<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.form.min.js"></script>


    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/additional-methods.min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
</head>
<body>
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a href="/" class="navbar-brand ">Административная панель</a>
		</div>
	</div>
	<div class="container">
		<br />
		<div class="col-sm-3 col-md-3 navvv">
			<ul class="nav nav-sidebar">
                <?php if( $this->perm_flags['items_show'] ) : ?>
				<li><a href="/admin/">Каталог</a></li>
				<?php endif; ?>		
				<?php if( $this->perm_flags['items_show'] ) : ?>
				<li><a href="/admin/orders">Заказы</a></li>
				<?php endif; ?>	
                <?php if( $this->perm_flags['god'] ) : ?>
				<li><a href="/admin/banners">Редактор баннеров спецпредложений</a></li>
				<?php endif; ?>
				<?php if( $this->perm_flags['god'] ) : ?>
				<li><a href="/admin/slides">Редактор слайдов</a></li>
				<?php endif; ?>
                <?php if( $this->perm_flags['news_access'] ) : ?>
				<li><a href="/admin/news">Новости</a></li>
                <?php endif; ?>
                <?php if( $this->perm_flags['god'] ) : ?>
                <li><a href="/admin/contact">Раздел "Контакты"</a></li>
				<li><a href="/admin/services">Раздел "Услуги"</a></li>
				<li><a href="/admin/actions">Раздел "Акции"</a></li>
				<li><a href="/admin/about">Раздел "О компании"</a></li>
				<li><a href="/admin/config_page">Редактирование шапки\подвала</a></li>
				<li><a href="/mibew">Вход в "онлайн-консультант"</a></li>
				<li><a href="/admin/login/list">Управление пользователями</a></li>
				<?php endif; ?>	
			</ul>
		</div>
		<div class="col-md-9">