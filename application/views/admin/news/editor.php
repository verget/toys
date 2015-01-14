                                <h1>Редактирование новости</h1>
<form role="form" action="/admin/news/edit/<?php echo $item->id?>/save"
    method="post" id="object-edit-form">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
                <label for="news[title]">Заголовок</label> 
                <input type="text" class="form-control" id="news[title]"
                    name="news[title]" placeholder="Заголовок"
                    value="<?php echo $item->title?>" />
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="news[slug]">Источник</label> 
                <input type="text" class="form-control" id="news[slug]"
                    name="news[slug]" placeholder="Источник"
                    value="<?php echo $item->slug?>" />
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="news-text">Текст новости</label>
                <textarea name="news[text]" id="news-text" class="form-control"
                    rows="10"><?php echo $item->text?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="news[meta_desc]">Описание (meta тег)</label>
                <textarea name="news[meta_desc]" id="news[meta_desc]" class="form-control"
                    rows="2"><?php echo $item->meta_desc?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="news[meta_keywords]">Ключевые слова (meta тег)</label>
                <textarea name="news[meta_keywords]" id="news[meta_keywords]" class="form-control"
                    rows="2"><?php echo $item->meta_keywords?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="/admin/news" class="btn btn-info">Назад</a>
    </div>
</form>
<script src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#news-text",
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
});
$(function(){
	$('#object-edit-form form:first()').on('submit', function(){
		$('#news-text').val(tinyMCE.get('editor').getContent());
	});
});
</script>
                            