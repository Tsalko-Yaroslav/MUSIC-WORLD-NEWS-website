<?php

use \models\User;

?>
<h1>NEWS</h1>
<?php
/** @var array $rows */
/** @var array $news */

?>

<div class="row">
    <?php foreach ($rows as $row): ?>
        <?php
        $tmpdate = explode('-', $row['date']);
        $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
        $id = User::getUserIdByName($row['Author_name']);

        $id = $id['id'];

        ?>
        <div class="col-3">
            <div class="categCards myCards" style="width: 5rem" data-date="<?= $date ?>">
                <div class="card" style="width: 18rem;">
                    <a style="color: black" href="/news/view/<?= $row['id'] ?>">
                        <img src="<?= $row['Photo_link'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><B><?= $row['News_name'] ?></B></p>
                            <a href="/user/view/<?= $id ?>" style="font-size: 20px"><?= $row['Author_name'] ?> </a>
                            <p style="font-size: 14px"><?= $date ?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
