<?php
/** @var string $title */
/** @var string $content */
/** @var string $headerTitle */
/** @var string $content */

/** @var string $siteName */

use models\User;

core\Core::getInstance()->app;


if (User::isUserAuthenticated())
    $user = User::getCurrentAuthenticatedUser();
else
    $user = null;

?>
<!doctype html>
<html land="en">
<head>
    <meta charset="UTF-8">
    <title><?= $siteName ?> | <?= $title ?></title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<header>
    header
    <?php if (!empty($user)): ?>
        <?= $user['login'] ?> <a href="/user/logout">[logout]</a>
    <?php endif; ?>

</header>
<main>
    <?= $content ?>
</main>
<footer>
    footer
</footer>
</body>
</html>
