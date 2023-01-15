
<h1>NEWS</h1>
<hr>
<?php

/** @var array $rows */
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
    <img src="<?= $news['Photo_link']?>" class="card-img-top" alt="...">
    <hr>
   <?=$news['News_text_content']?>
</div>
<hr>
<h1>Може вас зацікавити:</h1>
<hr>
<div class = "row">
    <?php foreach ($rows as $row): ?>
        <?php if($row['id']!=$news['id']):?>
        <?php
        $tmpdate = explode('-', $row['date']);
        $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
        ?>
        <div class = "col-3">
            <div class="categCards myCards" style="width: 5rem" data-date="<?= $date ?>">
                <div class="card" style="width: 18rem;">
                    <a style="color: black" href="/news/view/<?= $row['id'] ?>">
                        <img src="<?= $row['Photo_link'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><B><?= $row['News_name'] ?></B></p>
                            <p style="font-size: 20px"><?= $row['Author_name'] ?> </p>
                            <p style="font-size: 14px"><?= $date ?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    <?php endif;?>
    <?php endforeach; ?>
</div>