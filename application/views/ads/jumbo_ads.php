 <!--Джамбатрон-->
<?php if( !empty($ads) ):?>
	<?php foreach ($ads as $ads_item):?>		
	<div class="col-xs-4">
     	<div class="each_house">
			<div class="row">
				<div class="col-xs-5">
					<?php  if($ads_item->image_url):?>
					<?php echo ("<img src='/images/ads/$ads_item->image_url' class='item_img img-responsive'>");?>
						<?php else: echo ("<img src='/img/logo.slw.png' class='item_img img-responsive'>"); ?>
					<?php endif;?>
					<br>	
					<p>Описание:</p>
					<div class="description">
				       	 <?php echo strip_tags($ads_item->description)?>
				    </div>
				</div>
				<div class="col-xs-7">
					<div class="item_title">
						<p><strong><?php echo $ads_item->title ?></strong></p>
					</div>
					<div>
							<p>Категория:&nbsp;
								<span class = "info"><?php echo $ads_item->category_title?></span>
							</p>
							<p>Артикул:&nbsp;
							<span class = "info"><?php echo $ads_item->article?></span>
							</p>
							<p>Единица:&nbsp;
							<span class = "info"><?php echo $ads_item->measure?></span>
							</p>
							<p>Изготовлено: &nbsp;
							<span class = "info"><?php echo $ads_item->country_title?></span>
							</p> 
							<p>В наличии:&nbsp;
							<span class = "info"><?php echo $ads_item->in_stock?></span>
							</p>
						<span class="price"><?php
							setlocale(LC_MONETARY, 'ru_RU.utf8');
							echo money_format('%.0i', $ads_item->price) . "\n"; ?>
						</span>
						<div class="row" style="padding: 5px;">
								<button class="btn btn-sm btn-primary add_to_cart">В корзину</button>
								<a href="/object/<?php echo $ads_item->id?>"class="btn btn-sm btn-primary">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
	</div>
            <?php endforeach ?>
            <?php else:?>
            <h4>По Вашему запросу ничего не найдено</h4>
            <a href="javascript:history.back()"
                title="Вернуться на предыдущую страницу"
                class="btn btn-primary pull-right"> Вернуться </a>
        <?php endif;?>

    
<div class="ul_pagination" style = "position: relative; clear: both;">
    <p><?php echo $links; ?></p>
</div>




                            