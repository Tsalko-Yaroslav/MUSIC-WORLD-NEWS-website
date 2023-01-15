<?php
/** @var array $news */
?>
<?php
$tmpdate = explode('-', $news['date']);
$date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
?>
<div>
<h1><?= $news['News_name']?></h1>
    <p><?=$date?> <?= $news['Author_name']?></p>
    <hr>
<p><?=$news['short_discription']?></p>
</div>
<hr>
<div>
    <img src="<?= $news['Photo_link'] ?>" class="card-img-top" alt="...">
    <hr>
    <p><?=$news['News_text_content']?></p>
</div>
<hr>