<?php
/** @var array $rows*/

use models\User;

core\Core::getInstance()->pageParams['title'] = 'Категорії';

?>
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($rows as $row): ?>
            <div class="col">
                <div class="card shadow-sm">

                    <!--<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            -->
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225"  src="<?= $row['Genre_photolink']?>" width="100" height="100" alt="kkk">

                    <div class="card-body">
                        <p class="card-text text-center" style="font-size: 30px"><b><?= $row['Genre_name']?></b></p>
                        <hr>
                        <p class="card-text"><?= $row['Genre_discription']?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/Category/view/<?= $row['id']?>" type="button" class="btn btn-sm btn-outline-secondary">Дивитись</a>
                                <?php if(User::isAdmin()): ?>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Редагувати</button>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
</div>
<?php if(User::isAdmin()): ?>

    <p style="text-align: center"><a href="/category/add" class="w-20 btn btn-lg btn-primary btn-dark" type="submit">Додати категорію</a></p>

<?php else: ?>
    <hr>
<?php endif;?>

