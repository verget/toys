<html>
<head>
	<title><?php echo (!empty($title)?$title . ' - ':'') . $config['title']->value?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo !empty($description)?$description:$config['meta_desc']->value?>" />
	<meta name="keywords" content="<?php echo !empty($keywords)?$keywords:$config['meta_keywords']->value?>" />

<!-- Подключение галереи fancybox -->	
	<!-- Add jQuery library -->
	<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
		<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	
	<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/additional-methods.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
	
	<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/img/ball.ico" type="image/x-icon">
	
    <link rel="stylesheet" href="/css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="/css/style.css">
	
	<script src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
	<?php
	   session_start();
	   if(isset($_SESSION['cart']))
	       $cart_len = count($_SESSION['cart']);
	   else
	       $cart_len = 0;
	?>
</head>
<body>
  <!--Горизонтальное меню  --> 
	<div class="navbar navbar-inverse fixed-top">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">SLW-Toys</a>
	  </div>
	  <div class="navbar-collapse collapse navbar-inverse-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="/">Каталог</a></li>
	      <li><a href="/page/services">Доставка</a></li>
	      <li><a href="/page/actions">Акции</a></li>
	      <li><a href="/page/education">Вакансии</a></li>
	      <li><a href="/page/about">О компании</a></li>
	      <li><a href="/page/contact">Контакты</a></li>
	    </ul>
	    <form class="navbar-form navbar-left">
	     <div>
	   		<input class="form-control"  placeholder="Поиск по сайту" name = "search[keyword]">
		</div>
	    </form>
	    <ul class="nav navbar-nav navbar-right">
	      <li>
	      	<a href="" data-toggle="modal" data-target="#myModal" id = "cart">
			  Корзина <span class="badge" id = "cart_count"><?php echo $cart_len?></span>
			</a>
	      </li>
	    </ul>
	  </div>
	</div>

<div class = "big_div">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Корзина</h4>
        </div>
            <form class="form-horizontal" id = "cart_form">
                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="inputName" class="col-xs-2 control-label">ФИО:</label>
                        <div class="col-xs-10">
                          <input type="text" class="form-control" name = "client_name" id="inputName" placeholder="Заказчик" required="required">
                        </div>
                  </div>
                  <div class="form-group">
                      <label for="inputAddress" class="col-xs-2 control-label">Адрес:</label>
                      <div class="col-xs-10">
                        <input type="text" class="form-control" name = "address" id="inputAddress" placeholder="Адрес доставки" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-offset-2 col-xs-10 cart_items">
                          <table class = "cart_list table-striped" >
                        
                          </table>
                      </div>
                  </div>
                    <div class="col-xs-offset-7 col-xs-4">
                        На сумму: <span class = "price cart_summ"></span>р.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary set_order" data-dismiss="modal">Заказать</button>
               </div>
            </form>
    </div>
  </div>
</div>
<div class = "row">
	<div class = "col-xs-8">
<!-- Слайдер -->
	<?php if (!empty($slides)): ?>
	<?php $count = $slides; ?>			
	 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="8000">
	  <!-- Индикаторы -->
	  <div class="col-md-12">
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <?php $i = 1;?>
	    <?php unset($count[0]);?>
	    <?php foreach ($count as $c): ?>
	    	<li data-target="#carousel-example-generic" data-slide-to=<?php echo $i?>></li>
	    	<?php $i = $i+1;?>
	    <?php endforeach; ?>
	  </ol>
	  <!-- Содержимое слайдера (Обёртка для слайдов)-->
	  <div class="carousel-inner">
	    <div class="item active">	 
	      <img src="/images/slides/<?php echo $slides[0]->image_url?>" alt="..." class="slide_img"> 
	      <div class="carousel-caption"></div>
	    </div>
	    <?php unset($slides[0]);?>
	    <?php foreach ($slides as $slide): ?>
		    <div class="item">
		      <img src="/images/slides/<?php echo $slide->image_url?>" alt="..." class="slide_img">
		      <div class="carousel-caption"></div>
		    </div>
	    <?php endforeach; ?>
	  </div>
	  </div>
	  <!-- Контролы -->
	  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>
<?php endif;?>
	</div>
	<div class="col-md-4">
			<?php if(!empty($banners)):?>
				<?php foreach ($banners as $banner): ?>
					<?php if($banner->use):?>
	       			 <a href="<?php echo $banner->href?>"><img src="/images/banners/<?php echo $banner->image_url?>" class = "banner_img" /> </a>
	   				 <?php endif;?>
				<?php endforeach; ?>
			<?php endif;?>
  </div>
</div>

 <div class="very_big_div">
  <hr>