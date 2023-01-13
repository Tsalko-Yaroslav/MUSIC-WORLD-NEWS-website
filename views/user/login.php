<?php
/**@var string|null $error */
/**@var array $model */
core\Core::getInstance()->pageParams['title'] ='Вхід в аккаунт'
?>




<body style="background-image: url('../../themes/light/images/Sequence 01_1.gif')">
<main class="form-signin w-100 m-auto" >
    <form method="post" action="">
        <p style="text-align: center"><img src="../../themes/light/images/guitarBlack.png" width="100" height="100" alt="kkk"></p>
        <h1 style="color: white; text-shadow: 2px  2px 3px #000;" class="h3 mb-3 fw-normal text-center">Вхід в аккаунт</h1>
        <?php if (!empty($error)) : ?>
            <div class="text-center message error">

                <?= $error; ?>

            </div>

        <?php endif; ?>
        <div class="form-floating">
            <input type="email" class="form-control"  name="login" id="login" value="<?= $model['login'] ?>" placeholder="name@example.com">
            <label for="login">Електронна пошта</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control"  name="password" id="password" value="<?= $model['password'] ?>" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
        </div>



        <button class=" w-100 btn btn-dark btn-primary  " type="submit">Увійти</button>
        <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
    </form>
</main>
</body>
