<h1>
    Каталог &nbsp;&nbsp;&nbsp;
    <?php if ($edit_perms) : ?>
    <a href="/admin/new" class="btn btn-success">Добавить объект</a>
    <?php endif; ?>
</h1>
<form class="form-inline" role="form" action="/admin" method="get">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
            <input type="search[keywords]" class="form-control" id="keywords"
                placeholder="Введите текст для поиска">
        </div>
    </div>
    <div class="form-group">
        <label class="sr-only" for="price">Цена</label>
        <input type="text" class="form-control" id="price"
            id="search[price]" placeholder="Цена" style="width: 100px;" />
    </div>
    <div class="form-group">
        <label class="sr-only" for="total_area">Артикул</label>
        <input type="text" class="form-control" id="article"
            id="search[article]" placeholder="Артикул" style="width: 100px;" />
    </div>
    <div class="form-group">
        <label class="sr-only" for="total_area">Штрихкод</label>
        <input type="text" class="form-control" id="barcode"
            id="search[barcode]" placeholder="Штрихкод" style="width: 100px;" />
    </div>
    <button type="submit" class="btn btn-default">Искать</button>
    <br />
    <div style="margin-top: 5px;">
        <div class="form-group">
            <label class="sr-only" for="category_id">Категория</label>
            <select class="form-control" name="search[category_id]" id="category_id" >
            <?php foreach ($category_list as $item):?>
                <option value="<?php echo $item->id?>"
                    <?php echo ($search['category_id'] == $item->id)?'selected="selected"':''?>
                    ><?php echo $item->category_title?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label class="sr-only" for="type_id">Раздел</label>
            <select class="form-control" name="search[type_id]" id="type_id" >
            <?php foreach ($type_list as $item):?>
                <option value="<?php echo $item->id?>"
                    <?php echo ($search['type_id'] == $item->id)?'selected="selected"':''?>
                    ><?php echo $item->type_title?></option>
            <?php endforeach;?>
            </select>
        </div>
    </div>
</form>
<form action="/admin/action<?php echo (!empty($_GET))? '?' . http_build_query($_GET):''?>"
    method="post" id="objects-actions-form">
    <table class="table table-bordered object_table">
        <thead>
            <tr>
                <th rowspan="2"
                    style="vertical-align: middle; text-align: center;">
                    <input type="checkbox" id="select-all-checkbox" />&nbsp;ID
                </th>
                <th colspan="6">Заголовок</th>
                <th>Цена</th>
            </tr>
            <tr>
                <th style="text-align: center;">Артикул</th>
                <th style="text-align: center;">Штрихкод</th>
                <th>Единица</th>
                <th>Изготовлено</th>
                <th>Вес/Объем</th>
                <th style="text-align: center;">В упаковке</th>
                <th style="text-align: center;">В наличии</th>
            </tr>
        </thead>
        <tbody>
<?php if( !empty($ads_list) ):?>
<?php $odd = 0;?>
<?php foreach ($ads_list as $item):?>
	<tr class="odd<?php echo $odd?>">
                <td rowspan="2"
                    style="vertical-align: middle; text-align: center; min-width: 50px;">
                    <input type="checkbox"
                    id="select-checkbox-<?php echo $item->id?>"
                    name="cid[]" value="<?php echo $item->id?>" />&nbsp;<?php echo $item->id?>
            </td>
                <td colspan="6">
                    <a href="/admin/edit/<?php echo $item->id . (!empty($_GET)?'?' . http_build_query($_GET):'')?>"
                        class="btn btn-default btn-sm"
                        title="Редактировать этот объект"> 
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
			<?php echo $item->title?>
		</td>
                <td style="text-align: center;"><?php echo number_format($item->price, 0, ',', ' ');?></td>
            </tr>
            <tr class="odd<?php echo $odd?>">
                <td style="text-align: center;"><?php echo $item->article?></td>
                <td style="text-align: center;"><?php echo $item->barcode?></td>
                <td><?php echo $item->measure?></td>
                <td><?php echo $item->country_title?></td>
                <td><?php echo $item->weight?>/<?php echo $item->volume?></td>
                <td style="text-align: center;"><?php echo $item->packed?></td>
                <td style="text-align: center;"><?php echo $item->in_stock ?></td>
            </tr>
	<?php if( $odd == 0 )$odd = 1; else $odd = 0;?>
<?php endforeach;?>
<?php endif;?>
</tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <?php if ($edit_perms) : ?>
                    <a href="/admin/new" class="btn btn-success">Добавить объект</a>
                    <?php endif; ?>
                </td>
                <td colspan="3" style="vertical-align: middle;">
                    <div class="ul_pagination"><?php echo $pagination; ?></div>
                </td>
                <td colspan="2" style="text-align: center;">
                    <?php if ($edit_perms) : ?>
                    <button type="submit" name="action" value="remove"
                        class="btn btn-danger">Удалить выбранное</button>
                    <?php endif; ?>
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
                            
                            
                            