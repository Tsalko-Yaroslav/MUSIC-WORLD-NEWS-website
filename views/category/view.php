<?php
/** @var array $category */
/** @var array $news */

use models\User;

?>
<?php

?>
<h1><?= $category['Genre_name'] ?></h1>
<?php foreach ($news as $new): ?>
    <?php
        $tmpdate=explode('-',$new['date']);
        $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
    $id = User::getUserIdByName($new['Author_name']);

    $id = $id['id'];
    ?>
    <div class="categCards myCards ">

        <a style="color: black" href="/news/view/<?= $new['id']?>">
            <div class="row">
                <div class="col-2">
                    <img src="<?= $new['Photo_link']?>" class="card-img-top w-100" alt="...">
                </div>
                <div class=col-10>
                    <div class="card-body">
                        <p class="card-text"><B><?= $new['News_name'] ?></B></p>
                        <hr>
                        <a href="/user/view/<?= $id ?>" style="font-size: 20px"><?= $new['Author_name'] ?> </a>
                        <p style="font-size: 14px"><?= $date ?></p>
                    </div>
                      <?php if (User::isAdmin()): ?>
                    <a href="/news/edit/<?= $new['id']?>" class="btn btn-sm blackButtons">Редагувати</a>
                    <?php endif;?>
                </div>

            </div>
        </a>
    </div>
    <hr>


<?php endforeach; ?>
