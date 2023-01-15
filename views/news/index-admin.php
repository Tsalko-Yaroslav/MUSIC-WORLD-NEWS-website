<?php
use \models\User;
?>
<h1>NEWS</h1>


<?if(User::isAdmin()): ?>

    <p style="text-align: center"><a href="/news/add" class="w-20 btn btn-lg btn-primary blackButtons" type="submit">Додати новину</a></p>


<?php endif;?>
<?php
/** @var array $rows */
/** @var array $news */
?>
<?php

?>

<div class = "row">
    <?php foreach ($rows as $row): ?>
        <?php
        $tmpdate = explode('-', $row['date']);
        $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
        ?>
        <div class = "col-3 mt-5">
            <div class="categCards myCards" style="width: 5rem" data-date="<?= $date ?>">
                <div class="card" style="width: 18rem;">
                    <a style="color: black" href="/news/view/<?= $row['id'] ?>">
                        <img src="<?= $row['Photo_link'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><B><?= $row['News_name'] ?></B></p>
                            <p style="font-size: 20px"><?= $row['Author_name'] ?> </p>
                            <p style="font-size: 14px"><?= $date ?></p>
                            <a href="/news/edit/<?= $row['id']?>" class="btn btn-sm btn-outline-secondary">Редагувати</a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


