<?php
use \models\User;
?>
<h1>NEWS</h1>


<?if(User::isAdmin()): ?>

    <p style="text-align: center"><a href="/news/add" class="w-20 btn btn-lg btn-primary blackButtons" type="submit">Додати новину</a></p>


<?php endif;?>



