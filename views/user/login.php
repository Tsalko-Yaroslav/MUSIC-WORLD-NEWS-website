<?php
/**@var string|null $error */
/**@var array $model */
core\Core::getInstance()->pageParams['title'] ='Вхід в аккаунт'
?>


<h1>Вхід в аккаунт</h1>
<?php if (!empty($error)) : ?>
<dic class="message error">

         <?= $error; ?>

</dic>
<?php endif; ?>
<form method="post" action="">
    <div>
        <label for="login">Логін</label>


    </div>
    <div>
        <input type="email" name="login" id="login" value="<?= $model['login'] ?>"></input>

    </div>
    <div>
        <label for="password">Пароль</label>
    </div>
    <div>
        <input type="password" name="password" id="password" value="<?= $model['password'] ?>"></input>

    </div>

    <div>
        <button>Увійти</button>
    </div>

</form>