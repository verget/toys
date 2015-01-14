<!--Джамбатрон-->
<?php error_reporting(0); ?>
<?php if ($search[category_id]=='5'): $tr = ''; else: $tr = 'т.р.'; endif;?>
		<div class="tableview">
			<?php if( !empty($ads) ):?>
			 <table>
			 <tr>
			    <th>Адрес</th>
			    
			    <th>S.Общ/S.Жил S.Кух/Комнат</th>
			    <th>Этаж/ Этажность</th>
			    <th>Цена <?php echo $tr;?></th>
			    <th>Примечание</th>
			    <th>&nbsp;</th>
			 </tr>
				<?php foreach ($ads as $ads_item): ?>    		
				<tr>
					<td>
					
						Регион: <?php echo $ads_item->region_title ?> <br/>
						Район: <?php echo $ads_item->district_title ?> <br/>
						<?php echo $ads_item->street ?> 
					</td>
<!-- 					<td>
						<strong>Тип дома: </strong><?php// echo $ads_item->type_title?> </td>-->
					
					<?php $str = '';?>					
					<?php if($ads_item->total_area): $str.= $ads_item->total_area; else: $str.='0';?> <?php endif;?>
					<?php if($ads_item->living_area): $str.= '/'.$ads_item->living_area; else: $str.='/0'?> <?php endif;?>
					<?php if($ads_item->kitchen_area): $str.= '/'.$ads_item->kitchen_area; else: $str.='/0'?> <?php endif;?>
					<?php if($ads_item->rooms): $str.='/'.$ads_item->rooms; else: $str.='/0' ;?> <?php endif;?>
						
					<td style ="text-align: center;"><?php echo $str;?></td>			
					<td style = 'text-align: center'><?php if ($ads_item->floor): echo $ads_item->floor.'/'; else: echo '0/'?><?php endif;?><?php if ($ads_item->floors): echo $ads_item->floors; else: echo '0'?><?php endif;?></td>
					<td style = 'text-align: center'><?php echo $ads_item->price ?> </td>
					<td>
						<div class ="description">
				       		 <?php echo strip_tags($ads_item->description)?>
				       	 </div>
				    </td>
				    <td>
					<a href="/object/<?php echo $ads_item->id?>"
						class="btn btn-primary">Подробнее</a>
					</td>
				</tr>					

            <?php endforeach ?>
           </table>
         <?php else:?>
        </div>
            <h4>По Вашему запросу ничего не найдено</h4>
            <a href="javascript:history.back()"
                title="Вернуться на предыдущую страницу"
                class="btn btn-primary pull-right"> Вернуться </a>
        <?php endif;?>
    <div class="ul_pagination">
        <p><?php echo $links; ?></p>
    </div>



