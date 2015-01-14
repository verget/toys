
<script type="text/javascript">
	function loadTypes(category, type)
	{
	    var cat_id = $(category).val();
	    var type_select = $(type);
	    // send AJAX query, for district list of selected region
	    $.getJSON('/get_type/'+cat_id,  function(req){
	    type_select.html('');
	    $.each(req, function(key, val){
		    if (key == "<?php echo $search['type_id']?>"){
		      var  selected = 'selected';
		      }else var  selected = '';
		    type_select.append("<option value='"+ key +"' "+selected +" >"+ val +"</option>");
        });
	    });
	}
	$(function(){
	    loadTypes('#category_id', '#type_id')
	})
</script>
<div class="row">
	<div id="search_form_container" class="col-xs-7 gray_form" >
		<form class="form-horizontal" role="form"  action="<?php echo site_url('/');?>" method="get">
			<fieldset>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-4 control-label">Категория:</label>
						<div class="col-md-8">
							<select class="form-control" name="search[category_id]" id = "category_id" onchange="loadTypes(this, '#type_id')">
							
							<?php foreach ($searchFields['avail_category'] as $item):?>
								<option value="<?php echo $item->category_id?>"
								<?php if (($search['category_id']=='')&&($item->category_id == '1')): echo 'selected="selected"'; else : ''; ?>
									<?php echo ($item->category_id == $search['category_id'])?'selected="selected"':''?><?php endif;?>
									><?php echo $item->category_title?></option>
								
							<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Раздел:</label>
						<div class="col-md-8">
		 					<select class="form-control" name="search[type_id]" id = "type_id"> 
			 					<option>
			 					Выберите категорию
			 					</option>
							</select> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Изготовитель:</label>
						<div class="col-md-8">
							<select class="form-control" name="search[country_id]">
							<?php foreach ($searchFields['avail_country'] as $item):?>
								<option value="<?php echo $item->country_id?>"
									<?php echo ($item->country_id == $search['country_id'])?'selected="selected"':''?>
									><?php echo $item->country_title?></option>
							<?php endforeach;?>
							</select>
						</div>
					</div>
					
				</div>
				<div class="col-xs-6">
					<div class="form-group"> 
						<label class="col-xs-2 control-label">Артикул:</label> 
						<div class="col-xs-9 col-md-offset-1"> 
							<input type="text" class="form-control" name="search[article]" value='<?php echo $search['article']; ?>'>
						</div> 
					</div>
					<div class="form-group">
						<label class="col-xs-2 control-label">Цена:</label>
						<div class="col-xs-4 col-md-offset-1">
							<input name="search[price1]" type="text" value='<?php echo $search['price1']; ?>' class="form-control" placeholder="От">
						</div>
						<div class="col-xs-4 col-md-offset-1">
							<input name="search[price2]" type="text" value='<?php echo $search['price2']; ?>' class="form-control" placeholder="До">
						</div>
					</div>
					<div class="form-group"> 
					<?php if(isset($search['in_stock'])): ?>
					<?php $in_stock = $search['in_stock'] ;?>
					<?php else: $in_stock = '';?>
					<?php endif;?>
						<label class="col-xs-10 <?php echo (($in_stock)?'active':'')?>">Есть в наличии:
							<input type="checkbox" name="search[in_stock]" 
							<?php echo (($in_stock)?'checked':'')?> alt ="" title="В наличии"/>
						</label>
					</div>
					<div class="form-group pull-right">
						<input  value='Подобрать' type="submit" class="btn btn-primary">
						<div class="btn-group table-view-btn" data-toggle="buttons">  
							<label class="btn table-btn <?php echo (isset($_GET['tableview'])?'active':'')?>"><img src="/img/table1.png" title="Табличный вид" class="table_img"/> 
								<input type="checkbox" name="tableview" <?php echo (isset($_GET['tableview'])?'checked':'')?> alt ="Табличный вид" title="Табличный вид"/>
  							</label>  
  						</div>  
					</div>
				</div>
		</fieldset>
		</form>
		<div class="row">
			<!-- Чат -->
	       <a href="/mibew/client.php?locale=en&amp;style=silver" 
	       target="_blank" onclick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open(&#039;/mibew/client.php?locale=en&amp;style=silver&amp;url=&#039;+escape(document.location.href)+&#039;&amp;referrer=&#039;+escape(document.referrer), 'mibew', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;">
	       	<img src="/mibew/b.php?i=simple&amp;lang=en" border="0" width="200" height="55" alt=""/>
	       </a>
		</div>
	</div>
	<div class="col-xs-5 ">
		<div class="news_conteiner">
			<p><strong>Новости</strong></p> 
			<?php if(!empty($news)):?>
			<?php foreach ($news as $news_item): ?>
			    <strong><?php echo $news_item->title?></strong>
			    <div class="news" style="height: 77px;">
			        <?php echo $news_item->text?>
			    </div>
			    <p><a href="/news/<?php echo $news_item->id?>" title="Подробнее" 
			        class="pull-right" style="padding:0px 0px">Подробнее >></a></p>
			<?php endforeach ?>
			<?php endif;?>
		</div>
	</div>
</div>
<hr>