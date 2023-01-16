<?php

use models\User;
/** @var array $requests */
$user=User::getCurrentAuthenticatedUser();
?>
<div>
    <h2>Логін:</h2>
    <p><?= $user['login']?></p>
    <h2>Ім'я користвувача:</h2>
    <p><?= $user['Firstname']?> <?= $user['Surname']?></p>
    <h4>Рівень доступу: <?= $user['access_level']?></h4>
    <hr>
    <h3>Запити на рівень доступу №2:</h3>
    <hr>

    <?php foreach ($requests as $request):?>
        <div class=" myCards">

            <a style="color: black" href="/user/view/<?= $request['user_id'] ?>">
                <div class="row" >

                    <div class=col-10  style="border: black">
                        <div class="card-body">
                            <p class="card-text">Айді запиту: <?= $request['id'] ?></p>
                            <hr>
                            <p style="font-size: 20px">Айді користувача: <?= $request['user_id'] ?> </p>
                            <p style="font-size: 14px">Повідомлення: <?= $request['request_text'] ?></p>

                        </div>
                        <a href="/user/addaccess/<?= $request['user_id']?>" class="btn btn-sm blackButtons">Надати дозвіл</a>
                        <a href="/user/cancelaccess/<?= $request['user_id']?>" class="btn btn-sm blackButtons">Відхилити</a>
                    </div>

                </div>
            </a>

        </div>
        <hr>
    <?php endforeach;?>


</div>
