<h1>Редактирование баннера</h1>
<div class="row">
<div class="col-md-6">
<form role="form" action="/admin/banners/edit/<?php echo $item->id?>/save"
    method="post" id="object-edit-form">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
                <label for="banners[title]">Заголовок</label> 
                <input type="text" class="form-control" id="banners[title]"
                    name="banners[title]" placeholder="Заголовок"
                    value="<?php echo $item->title?>" />
            </div>
        </div>
       
        <div class="row">
            <div class="form-group">
                <label for="href">Ссылка</label>
                <input name="banners[href]" id="href" class="form-control" value="<?php echo $item->href?>" />
            </div>
        </div>
        <div class="row">
        	 <label>Предложение действительно</label><br />
        	 		<input type="checkbox" name ="banners[use]" value = 1 <?php if ($item->use) echo "checked" ?>   />
        	 <br />
        	 <br />
        </div>
      </div> 
            <button type="submit" class="btn btn-success">Сохранить</button>
      			<a href="/admin/banners" class="btn btn-info">Назад</a> 
  </form>      
 </div> 
 <div class="col-md-6"> 
 <div id="uploader">
  <label>Изображение</label> <br />
  <?php if( !empty($item->image_url) ):?>
			<img src="/images/banners/<?php echo $item->image_url?>" class="mini_img img-thumbnail" />
				<a href="/admin/banners/remove_image/<?php echo $item->id?>">
					<span class="glyphicon glyphicon-trash"></span> Удалить
				</a>
	<?php endif;?>
		<form action="/admin/banners/upload/<?php echo $item->id?>" method="post" enctype="multipart/form-data">
			<input type="file" multiple name="photo"  />
			<button type="submit" class="btn" id="upload-btn">
				<span class="glyphicon glyphicon-save"></span> Загрузить
			</button>
		</form>

		</div>
	</div>   
</div>
