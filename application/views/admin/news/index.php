<h1>
    Новости &nbsp;&nbsp;&nbsp; 
    <a href="/admin/news/new" class="btn btn-success">Добавить новость</a>
</h1>
<form action="/admin/news/action<?php echo (!empty($_GET))? '?' . http_build_query($_GET):''?>"
    method="post" id="objects-actions-form">
    <table class="table table-bordered object_table">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center;">
                    <input type="checkbox" id="select-all-checkbox" />&nbsp;ID
                </th>
                <th style="width: 70%">Заголовок</th>
                <th>Алиас</th>
            </tr>
        </thead>
        <tbody>
<?php if( !empty($news) ):?>
<?php $odd = 0;?>
<?php foreach ($news as $item):?>
	<tr class="odd<?php echo $odd?>">
        <td style="vertical-align: middle; text-align: center; min-width: 50px;">
            <input type="checkbox"
            id="select-checkbox-<?php echo $item->id?>"
            name="cid[]" value="<?php echo $item->id?>" />&nbsp;<?php echo $item->id?>
        </td>
        <td>
            <a href="/admin/news/edit/<?php echo $item->id . (!empty($_GET)?'?' . http_build_query($_GET):'')?>"
                class="btn btn-default btn-sm"
                title="Редактировать новость"> 
            <span class="glyphicon glyphicon-pencil"></span>
            </a> <?php echo $item->title?>
        </td>
        <td style="text-align: center;"><?php echo $item->slug?></td>
    </tr>
    <?php if( $odd == 0 )$odd = 1; else $odd = 0;?>
<?php endforeach;?>
<?php endif;?>
</tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="vertical-align: middle; text-align: right;">
                    <div class="ul_pagination"><?php echo $pagination; ?></div>
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