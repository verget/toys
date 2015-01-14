<h2>Редактирование объекта</h2>
 <?php// if ($edit_perms) : ?>
<form role="form" action="/admin/edit/<?php echo $ad->id?>/save" method="post" id="object-edit-form">
<?php// endif;?>
<div class="container-fluid">
	<div class="row">
		<div class="form-group col-xs-12">
			<label for="object[title]">Заголовок</label>
			<input type="text" class="form-control" id="object[title]" 
				name="object[title]" placeholder="Заголовок" value="<?php echo $ad->title?>" />
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-4">
			<label for="object[category_id]">Категория</label>
			<select class="form-control" id="object[category_id]" name="object[category_id]" >
			<?php foreach ($category_list as $item):?>
				<option value="<?php echo $item->id?>"
					<?php echo ($ad->category_id == $item->id)?'selected="selected"':''?>
					><?php echo $item->category_title?></option>
			<?php endforeach;?>
			</select>
		</div>
		<div class="form-group col-xs-4">
			<label for="object[type_id]">Раздел</label>
			<select class="form-control" id="object[type_id]" name="object[type_id]" >
			<?php foreach ($type_list as $item):?>
				<option value="<?php echo $item->id?>"
					<?php echo ($ad->type_id == $item->id)?'selected="selected"':''?>
					><?php echo $item->type_title?></option>
			<?php endforeach;?>
			</select>
		</div>
		<div class="form-group col-xs-4">
			<label for="object[country_id]">Изготовлено</label>
			<select class="form-control" id="object[country_id]" name="object[country_id]" >
			<?php foreach ($country_list as $item):?>
				<option value="<?php echo $item->id?>"
					<?php echo ($ad->country_id == $item->id)?'selected="selected"':''?>
					><?php echo $item->country_title?></option>
			<?php endforeach;?>
			</select>
		</div>
		
	</div>
	<div class="row">
		<div class="form-group col-xs-4">
			<label for="object[price]">Цена</label>
			<input type="text" class="form-control" id="object[price]" 
				name="object[price]" placeholder="Цена" value="<?php echo $ad->price?>" />
		</div>
		<div class="form-group col-xs-4">
			<label for="object[article]">Артикул</label>
			<input type="text" class="form-control" id="object[article]" 
				name="object[article]" placeholder="Артикул" value="<?php echo $ad->article?>" />
		</div>
		<div class="form-group col-xs-4">
			<label for="object[barcode]">Штрихкод</label>
			<input type="text" class="form-control" id="object[barcode]" 
				name="object[barcode]" placeholder="Штрихкод" value="<?php echo $ad->barcode?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="object[measure]">Единица</label>
				<input type="text" class="form-control" id="object[measure]" 
					name="object[measure]" placeholder="Единица"
					value="<?php echo $ad->measure?>" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="object[volume]">Объем</label>
				<input type="text" class="form-control" id="object[volume]" 
					name="object[volume]" placeholder="Объем"
					value="<?php echo $ad->volume?>" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="object[weight]">Вес</label>
				<input type="text" class="form-control" id="object[weight]" 
					name="object[weight]" placeholder="Вес"
					value="<?php echo $ad->weight?>" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="object[packed]">В упаковке</label>
				<input type="text" class="form-control" id="object[packed]" 
					name="object[packed]" placeholder="В упаковке"
					value="<?php echo $ad->packed?>" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="object[in_stock]">В наличии</label>
				<input type="text" class="form-control" id="object[in_stock]" 
					name="object[in_stock]" placeholder="В наличии"
					value="<?php echo $ad->in_stock?>" />
			</div>
		</div>

	</div>	

	<div class="row">
		<div class="form-group col-md-12">
			<label for="object[description]">Описание</label>
			<textarea name="object[description]" 
				id="object-description" rows="10"><?php echo $ad->description?></textarea>
		</div>
	</div>
	<div class="row">
        <div class="form-group col-md-12">
            <label for="object[meta_desc]">Описание (meta тег)</label>
            <textarea name="object[meta_desc]" id="object[meta_desc]" class="form-control"
                rows="2"><?php echo $ad->meta_desc?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="object[meta_keywords]">Ключевые слова (meta тег)</label>
            <textarea name="object[meta_keywords]" id="object[meta_keywords]" class="form-control"
                rows="2"><?php echo $ad->meta_keywords?></textarea>
        </div>
    </div>
</div>
 <?php// if ($edit_perms) : ?>
</form>
<?php// endif; ?>
<?php if( $ad->id > 0 ):?>
<br />
<div id="uploader">
    <h4>Изображения</h4>
    <?php// if ($edit_perms) : ?>
	<form action="/admin/upload/<?php echo $ad->id?>" method="post" enctype="multipart/form-data">
		<input type="file" multiple name="photos[]" style="display: inline-block;" /> &nbsp;&nbsp;
		<button type="submit" class="btn" id="upload-btn">
			<span class="glyphicon glyphicon-save"></span> Загрузить
		</button>
	</form>
    <?php// endif; ?>
	<div id="object-image-list">
	<?php if( !empty($ad->images) ):?>
	<?php foreach ($ad->images as $image):?>
		<div class="image" id="ob-image-<?php echo $image->id?>" data-id="<?php echo $image->id?>">
			<img src="/images/ads/<?php echo $image->image_url?>" class="img-thumbnail" />
			<a href="#" onclick="return removeImage(<?php echo $image->id?>);">
				<span class="glyphicon glyphicon-trash"></span> Удалить
			</a>
		</div>
	<?php endforeach;?>
	<?php endif;?>
	</div>
</div>
<?php else:?>
<div class="alert alert-warning" role="alert">
    <strong>Внимание!</strong> Сначала сохраните объект, что бы можно было загружать изображения
</div>
<?php endif;?>
<br />
<?php// if ($edit_perms) : ?>
<button type="button" class="btn btn-success" onclick="$('#object-edit-form').submit();">Сохранить</button>
<?php// endif; ?>
<a href="/admin?<?php echo $search_query?>" class="btn btn-info">Назад</a>

<br />
<br />
<br />
<br />

<script src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#object-description",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
});
function uploadProcess(mode){
	if( mode )
		$('#upload-btn').attr('disabled', 'disabled')
			.find('span').removeClass('glyphicon-save').addClass('glyphicon glyphicon-refresh icon-span');
	else
		$('#upload-btn').removeAttr('disabled')
			.find('span').removeClass('glyphicon-refresh icon-span').addClass('glyphicon-save');
}
function removeImage(img_id){
    $.getJSON('/admin/removeimage/'+img_id, function(req){
        if( req.result ){
            $('#ob-image-'+img_id).fadeOut('fast', function(){ $(this).remove() });
        }
    });
    return false;
}
$(function(){
	$('#object-edit-form form:first()').on('submit', function(){
		$('#object-description').val(tinyMCE.get('editor').getContent());
	});

	$('#uploader form').ajaxForm({
		dataType: 'json',
		beforeSubmit: function(){ uploadProcess(true); },
		success: function(resp){
			uploadProcess(false);
			if( resp.result ){
				$.each(resp.images, function(i, val){
					$('#object-image-list').append('<div class="image" id="ob-image-'+val.image_id+'">'+
							'<img src="/images/ads/'+val.file_name+'" class="img-thumbnail" />'+
							'<a href="#" onclick="return removeImage('+val.image_id+');">'+
								'<span class="glyphicon glyphicon-trash"></span> Удалить'+
							'</a>'+
						'</div>')
				});
			} 
		},
		error:function(){ uploadProcess(false); },
	});
});
</script>