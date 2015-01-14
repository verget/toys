<?php if(!empty($news)):?>
<?php foreach ($news as $news_item): ?>
    <h2><?php echo $news_item->title?></h2>
    <div class="news" style="height: 60px;">
        <?php echo $news_item->text?>
    </div>
    <p><a href="/news/<?php echo $news_item->id?>" title="Подробнее" 
        class="pull-right" style="padding-top:5px">Подробнее >></a></p>
<?php endforeach ?>
<?php endif;?>
