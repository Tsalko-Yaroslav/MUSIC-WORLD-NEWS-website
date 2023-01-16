<?php
use models\User;
/** @var array $rows */
$user=User::getCurrentAuthenticatedUser();
?>

<div>
    <h2>Логін:</h2>
    <p><?= $user['login']?></p>
    <h2>Ім'я користвувача:</h2>
    <p><?= $user['Firstname']?> <?= $user['Surname']?></p>
    <p>Ви журналіст!</p>
</div>
<hr>
<h1>Ваші пости:</h1>
<hr>
<div class = "row">
    <?php foreach ($rows as $row): ?>
        <?php
        $tmpdate = explode('-', $row['date']);
        $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
        ?>

        <div class="categCards myCards">

            <a style="color: black" href="/news/view/<?= $row['id']?>">
                <div class="row">
                    <div class="col-2">
                        <img src="<?= $row['Photo_link']?>" class="card-img-top w-100" alt="...">
                    </div>
                    <div class=col-10>
                        <div class="card-body">
                            <p class="card-text"><B><?= $row['News_name'] ?></B></p>
                            <hr>
                            <p style="font-size: 20px"><?= $row['Author_name'] ?> </p>
                            <p style="font-size: 14px"><?= $date ?></p>

                        </div>
                        <a href="/news/edit/<?= $row['id']?>" class="btn btn-sm blackButtons">Редагувати</a>
                    </div>

                </div>
            </a>
        </div>
        <hr>
    <?php endforeach; ?>
</div>

