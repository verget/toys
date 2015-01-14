 <!--Джамбатрон-->
<?php if( !empty($ads) ):?>
	<?php foreach ($ads as $ads_item):?>		
	<div class="col-xs-4">
     	<div class="each_house">
			<div class="row">
				<div class="col-xs-5">
					<?php  if($ads_item->image_url):?>
					<?php echo (" src='/images/$ads_item->image_url' class='item_img img-responsive'>");?>
						<?php else: echo ("<img src='/img/logo.slw.png' class='item_img img-responsive'>"); ?>
					<?php endif;?>
					<br>	
					<p>Описание:</p>
					<img src='/images/2_ae22bbb87bf80f0ce04019666dd6d287.png' class='item_img img-responsive'>
					<div class="description">
				       	 <?php echo strip_tags($ads_item->description)?>
				    </div>
				</div>
				<div class="col-xs-7">
					<div class="item_title">
						<p><strong><?php echo $ads_item->title ?></strong></p>
					</div>
					<div>
							<p><span>Категория:&nbsp;</span>
								<b><?php echo $ads_item->category_title?></b>
							</p>
							<p><span>Артикул:&nbsp;</span>
							<b><?php echo $ads_item->article?></b>
							</p>
							<p><span>Единица:&nbsp;</span>
							<b><?php echo $ads_item->measure?></b>
							</p>
							<p><span>Изготовлено: &nbsp;</span>
							<b><?php echo $ads_item->country_title?></b>
							</p> 
							<p><span class="th">В наличии:&nbsp;</span>
							<b><?php echo $ads_item->in_stock?></b>
							</p>
						<span class="price"><?php 
							setlocale(LC_MONETARY, 'ru_RU.utf8');
							echo money_format('%.0i', $ads_item->price) . "\n"; ?>
						</span>
						<div class="row" style="padding: 5px;">
								<a href="/object/<?php echo $ads_item->id?>"class="btn btn-sm btn-primary">В корзину</a>
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




                            