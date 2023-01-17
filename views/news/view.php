<h1>NEWS</h1>
<hr>
<?php

/** @var array $rows */

/** @var array $news */

use models\User;

?>
<?php
$tmpdate = explode('-', $news['date']);
$date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
$id = User::getUserIdByName($news['Author_name']);

$id = $id['id'];
?>
<?php if (User::isAdmin()): ?>
    <a href="/news/edit/<?= $news['id'] ?>" class="btn btn-sm blackButtons">Редагувати</a>
    <a href="/news/delete/<?= $news['id'] ?>" class="btn btn-sm blackButtons">Видалити</a>
<?php elseif (User::isAuthor()):?>
    <a href="/news/edit/<?= $news['id'] ?>" class="btn btn-sm blackButtons">Редагувати</a>
<?php endif; ?>
<div>
    <h1><?= $news['News_name'] ?></h1>
    <p><?= $date ?>  <a href="/user/view/<?= $id ?>" style="font-size: 20px"><?= $news['Author_name'] ?> </a></p>
    <hr>
    <p><?= $news['short_discription'] ?></p>
</div>
<hr>
<div>
   <p style="text-align: center"><img width="1000"  src="<?= $news['Photo_link'] ?>" alt="..."></p>
    <hr>
    <?= $news['News_text_content'] ?>
</div>
<hr>
<h1>Може вас зацікавити:</h1>
<hr>
<div class="row">
    <?php foreach ($rows as $row): ?>
        <?php if ($row['id'] != $news['id']): ?>
            <?php
            $tmpdate = explode('-', $row['date']);
            $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
            ?>
            <div class="col-3">
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

        <?php endif; ?>
    <?php endforeach; ?>
</div>