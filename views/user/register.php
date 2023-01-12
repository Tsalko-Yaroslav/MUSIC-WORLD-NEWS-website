<?php
/**@var array $errors */
/**@var array $model */
core\Core::getInstance()->pageParams['title'] ='Реєстрація'
?>
<h1>Реєстрація</h1>
<form method="post" action="">
    <div>
        <label for="login">Логін</label>


    </div>
    <div>
        <input type="email" name="login" id="login" value="<?= $model['login'] ?>"></input>
        <?php if (!empty($errors['login'])): ?>
            <span class="error"> <?= $errors['login']; ?></span>
        <?php endif; ?>
    </div>
    <div>
        <label for="password">Пароль</label>
    </div>
    <div>
        <input type="password" name="password" id="password" value="<?= $model['password'] ?>"></input>
        <?php if (!empty($errors['password'])): ?>
            <span class="error"> <?= $errors['password']; ?></span>
        <?php endif; ?>
    </div>
    <div>
        <label for="password">Повторіть пароль</label>
    </div>
    <div>
        <input type="password" name="password2" id="password2" value="<?= $model['password2'] ?>"></input>
        <?php if (!empty($errors['password2'])): ?>
            <span class="error"> <?= $errors['password2']; ?></span>
        <?php endif; ?>
    </div>
    <div>
        <label for="Firstname">Ім'я</label>
    </div>
    <div>
        <input type="text" name="Firstname" id="Firstname" value="<?= $model['Firstname'] ?>"></input>
        <?php if (!empty($errors['Firstname'])): ?>
            <span class="error"> <?= $errors['Firstname']; ?></span>
        <?php endif; ?>
    </div>
    <div>
        <label for="Surname">Фамілія</label>
    </div>
    <div>
        <input type="text" name="Surname" id="Surname" value="<?= $model['Surname'] ?>"></input>
        <?php if (!empty($errors['Surname'])): ?>
            <span class="error"> <?= $errors['Surname']; ?></span>
        <?php endif; ?>
    </div>
    <div>
        <button>Зареєструватися</button>
    </div>

</form>