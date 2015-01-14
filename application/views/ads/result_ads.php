<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
<?php $images = $ads_item->images;?>
<?php 
$img_path = '/images/ads/';
if( empty($images) )
	$first_img = '/img/logo.slw.png';
else
	$first_img = $img_path . $images[0]->image_url;
?>
<div class="row">
    <!-- Картинки -->
        <h4><strong><?php echo $ads_item->title ?></strong></h4>
    <div class="col-md-4">
			<a class="fancybox img-thumbnail" rel="group" href="<?php echo $first_img?>">
				<img src="<?php echo $first_img?>" class="img-responsive" /> 
			</a>
    </div>
    <div class="col-md-8">
    <?php if( !empty($images) ):?>
     <?php array_shift($images) ;?>
    <?php foreach( $images as $image ):?>
        <a class="fancybox img-thumbnail" style = "margin: 1px" 
        		rel="group" href="<?php echo $img_path . $image->image_url?>">
        		<img src="<?php echo $img_path . $image->image_url?>" class = "mini_img"/>
        </a>
    <?php endforeach;?>
    <?php endif;?>
	</div>
</div>
<div class="this_house">
	<div class="row">
        <div class="col-xs-4">
            <!-- Цена -->
            <p> <strong>Цена:</strong>
            <span class="price"><?php 
							setlocale(LC_MONETARY, 'ru_RU.utf8');
							echo money_format('%.0i', $ads_item->price) . "\n"; ?></span>
			</p>
             <p>
                <strong>Категория: </strong><?php echo $ads_item->category_title ?></p>
            <p>
                <strong>Раздел: </strong><?php echo $ads_item->type_title ?></p>
            <p>
                <strong>Изготовлено: </strong><?php echo $ads_item->country_title?> </p>
          	<p>
                <strong>Информация: </strong>
            </p>  
				<?php echo $ads_item->description?>
        </div>
        <div class="col-xs-8">
            <!-- Блок информации -->

            <p>
                <strong>Артикул: </strong><?php echo $ads_item->article ?></p>
            <p>
                <strong>Штрихкод: </strong><?php echo $ads_item->barcode?> </p>
            <p>
                <strong>Единица: </strong><?php echo $ads_item->measure?></p>
            <p>
                <strong>Объем/Вес: </strong><?php echo $ads_item->volume?>/<?php echo $ads_item->weight?></p>
            <p>
                <strong>В упаковке: </strong><?php echo $ads_item->packed?></p>
            <p>
                <strong>В наличии: </strong><?php echo $ads_item->in_stock?> </p>
			<div class="row" style="padding: 5px;">
				<a href="/object/<?php echo $ads_item->id?>"class="btn btn-primary">В корзину</a>
				<a href="javascript:history.back()" title="Вернуться на предыдущую страницу" class="btn btn-primary">Вернуться </a>
			</div>
		</div>
	</div>
</div>
<hr>
                            