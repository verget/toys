
<h1>
    Заказы &nbsp;&nbsp;&nbsp; 
</h1>
<form action="/admin/news/action<?php echo (!empty($_GET))? '?' . http_build_query($_GET):''?>"
    method="post" id="objects-actions-form">
    <table class="table table-bordered object_table">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center;">
                    <input type="checkbox" id="select-all-checkbox" />&nbsp;ID
                </th>
                <th>Заказчик</th>
                <th>Адресс</th>
                <th>Товары</th>
            </tr>
        </thead>
        <tbody>
<?php if( !empty($orders) ):?>
<?php $odd = 0;?>
<?php foreach ($orders as $item):?>
	<tr class="odd<?php echo $odd?>">
        <td style="vertical-align: middle; text-align: center;">
            <input type="checkbox"
            id="select-checkbox-<?php echo $item->id?>"
            name="cid[]" value="<?php echo $item->id?>" />&nbsp;<?php echo $item->id?>
        </td>
       <td style="text-align: center;"><?php echo $item->client_name?></td>
       <td style="text-align: center;"><?php echo $item->client_address?></td>
       <td><?php echo $item->items?></td>
    </tr>
    <?php if( $odd == 0 )$odd = 1; else $odd = 0;?>
<?php endforeach;?>
<?php endif;?>
</tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="vertical-align: middle; text-align: right;">
                   
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