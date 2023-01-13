<?php
/**@var array $errors */
/**@var array $model */
core\Core::getInstance()->pageParams['title'] = 'Реєстрація'
?>

<body style="background-image: url('../../themes/light/images/Sequence 01_1.gif')">
<main  class="form-signin w-100 m-auto" >
    <form method="post" action="">
        <p style="text-align: center"><img src="../../themes/light/images/guitarBlack.png" width="100" height="100" alt="kkk"></p>
        <h1 style="color: white; text-shadow: 2px  2px 3px #000;" class="h3 mb-3 fw-normal text-center">Реєстрація</h1>

        <div class="form-floating">
            <input type="email" class="form-control"  name="login" id="login" value="<?= $model['login'] ?>" placeholder="name@example.com">
            <label for="login">Електронна пошта</label>
            <?php if (!empty($errors['login'])): ?>
                <span class="error"> <?= $errors['login']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control"  name="password" id="password" value="<?= $model['password'] ?>" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
            <?php if (!empty($errors['password'])): ?>
                <span class="error"> <?= $errors['password']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control"  name="password2" id="password2" value="<?= $model['password2'] ?>" placeholder="Password">
            <label for="floatingPassword">Пароль(повторіть)</label>
            <?php if (!empty($errors['password2'])): ?>
                <span class="error"> <?= $errors['password2']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control"  name="Firstname" id="Firstname" value="<?= $model['password2'] ?>" placeholder="Firstname">
            <label for="Firstname">Введіть ваше ім'я</label>
            <?php if (!empty($errors['Firstname'])): ?>
                <span class="error"> <?= $errors['Firstname']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control"  name="Surname" id="Surname" value="<?= $model['password2'] ?>" placeholder="Surname">
            <label for="Surname">введіть вашу фамілію</label>
            <?php if (!empty($errors['Surname'])): ?>
                <span class="error"> <?= $errors['Surname']; ?></span>
            <?php endif; ?>
        </div>


        <button class="w-100 btn btn-lg btn-primary btn-dark" type="submit">Увійти</button>
        <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
    </form>
</main>
</body>
<!--<form method="post" action="">
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

</form>-->