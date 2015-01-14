<script src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#editor",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern jbimages"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
$(function(){
	$('.big_div form:first()').on('submit', function(){
		$('#editor').val(tinyMCE.get('editor').getContent());
	});
});
</script>

<div class = "very_big_div">
  <div class = "big_div">
	<h3>Акции</h3>
	<form action="/admin/actions/save" method="post" role="form">
		<div class="form-group">
			<label for="page-title">Заголовок страницы</label>
			<input type="text" class="form-control" name="page[title]" id="page-title" 
				placeholder="Заголовок страницы" value="<?php echo $page->title?>" />
		</div>
		<textarea id="editor" name="page[desc]" class="texteditor"><?php echo $page->desc?></textarea>
		<br />
		<div class="form-group">
			<label for="page-meta_desc">Описание (meta тег)</label>
			<textarea rows="2" class="form-control" name="page[meta_desc]" id="page-meta_desc" 
				placeholder=""><?php echo $page->meta_desc?></textarea>
		</div>
		<div class="form-group">
			<label for="page-meta_keywords">Ключевые слова (meta тег)</label>
			<textarea rows="2" class="form-control" name="page[meta_keywords]" id="page-meta_keywords" 
				placeholder=""><?php echo $page->meta_keywords?></textarea>
		</div>
		<input type="submit" value="Сохранить" class="btn btn-default" />
	</form>
	</div>
</div>