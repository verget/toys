
<div class = "very_big_div">
  <div class = "big_div">
	<h3>Редактирование шапки\подвала</h3>
	<form action="/admin/config_page/save" method="post" role="form">
	<?php if( !empty($config) ):?>
	<?php $cont = $config['offices'];?>
	<div class="form-group"> 
			<label for="config-<?php echo $cont->ckey?>"><?php echo $cont->title?></label>
			<textarea rows="4" class="form-control " name="config[<?php echo $cont->ckey?>]" 
				id="config-<?php echo $cont->ckey?>"><?php echo $cont->value?></textarea>
 	</div> 
	<?php unset($config['offices']); ?>
	<?php foreach ($config as $conf):?>
		<div class="form-group">
			<label for="config-<?php echo $conf->ckey?>"><?php echo $conf->title?></label>
			<input type="text" class="form-control" name="config[<?php echo $conf->ckey?>]" 
				id="config-<?php echo $conf->ckey?>" value="<?php echo $conf->value?>" />
		</div>
	<?php endforeach;?>
	<?php endif;?>
		<input type="submit" value="Сохранить" class="btn btn-success" />
	</form>
	</div>
</div>