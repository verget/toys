<h1>
    Баннеры &nbsp;&nbsp;&nbsp; 
<!--     <a href="/admin/new" class="btn btn-success">Добавить баннер</a> -->
</h1>

<form action="/admin/banners/action"
    method="post" id="objects-actions-form">
    <table class="table table-bordered object_table">
        <thead>
            <tr>
                <th rowspan="2"
                    style="vertical-align: middle; text-align: center;">
                    <input type="checkbox" id="select-all-checkbox" />&nbsp;ID
                </th>
                <th colspan="7">Заголовок</th>
            </tr>
            <tr>   		
                <th style="text-align: center;">Действительно</th>             
                <th style="text-align: center;">Картинка</th>
                <th style="text-align: center;">Название</th>
                <th style="text-align: center;">Предложение</th>
               	<th style="text-align: center;">Редактировать</th>
            </tr>
        </thead>
        <tbody>
<?php if( !empty($banners) ):?>
<?php $odd = 0;?>
<?php foreach ($banners as $item):?>
	<tr class="odd<?php echo $odd?>" style="text-align: center; vertical-align: middle;">
            <td style="text-align: center; min-width: 40px;">
               <input type="checkbox"
               id="select-checkbox-<?php echo $item->id?>"
               name="cid[]" value="<?php echo $item->id?>" />&nbsp;<?php echo $item->id?>
            </td>
            <td style="text-align: center; vertical-align: middle;"><?php if($item->use)echo '<img src="/img/yes.png">';  else echo '<img src="/img/del.png">'?></td>
            <td style="text-align: center; vertical-align: middle;"><img src='/images/banners/<?php echo $item->image_url?>' class="mini_img" /></td>
            <td style="text-align: center; vertical-align: middle;"><?php echo $item->title;?></td>     	
            <td style="text-align: center; vertical-align: middle;"><a href='<?php echo $item->href?>'><?php echo $item->href?></a></td>
            <td style="text-align: center; vertical-align: middle;">
               <a href="/admin/banners/edit/<?php echo $item->id?>"
                        class="btn btn-default btn-sm"
                        title="Редактировать этот баннер"> 
               <span class="glyphicon glyphicon-pencil"></span>
               </a>
						</td>
  </tr>
	<?php if( $odd == 0 )$odd = 1; else $odd = 0;?>
<?php endforeach;?>
<?php endif;?>
</tbody>
    <tfoot>
      <tr>
        <td colspan="3" style="text-align: center;">
          <a href="/admin/banners/new" class="btn btn-success">Добавить баннер</a></td>
        <td colspan="3" style="vertical-align: middle;"> 
        	 <button type="submit" name="action" value="remove"
                        class="btn btn-danger">Удалить выбранное</button>
        </td>
      </tr>
   </tfoot>
</table>
</form>
<script type="text/javascript">
$(function(){
    $('#select-all-checkbox').on('change', function(){
        $('#objects-actions-form [name="cid[]"]').prop('checked', $('#select-all-checkbox').prop('checked')); 
    });
});
</script>