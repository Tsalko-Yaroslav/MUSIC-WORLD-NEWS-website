<?php
/** @var array $category */
/** @var array $news */
?>
<?php

?>
<h1><?= $category['Genre_name'] ?></h1>
<?php foreach ($news as $new): ?>
    <?php
        $tmpdate=explode('-',$new['date']);
        $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
    ?>
    <div class="categCards myCards">

        <a style="color: black" href="/news/view/<?= $new['id']?>">
            <div class="row">
                <div class="col-2">
                    <img src="<?= $new['Photo_link']?>" class="card-img-top w-100" alt="...">
                </div>
                <div class=col-10>
                    <div class="card-body">
                        <p class="card-text"><B><?= $new['News_name'] ?></B></p>
                        <hr>
                        <p style="font-size: 20px"><?= $new['Author_name'] ?> </p>
                        <p style="font-size: 14px"><?= $date ?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <hr>


<?php endforeach; ?>
