<?php

use models\User;

$user = User::getCurrentAuthenticatedUser();
?>

<div>
    <h2>Логін:</h2>
    <p><?= $user['login'] ?></p>
    <h2>Ім'я користвувача:</h2>
    <p><?= $user['Firstname'] ?> <?= $user['Surname'] ?></p>
    <?php if (User::isRequestExist($user['id'])): ?>
        <p style="text-align: center"><a href="/user/request/" class="w-20 btn btn-lg btn-primary blackButtons"
                                         type="submit">Стати журналістом</a></p>
    <?php else: ?>
        <p>Ви вже подали заяву на становлення журналістом, дочекайтеся відповіді!</p>
    <?php endif; ?>
</div>