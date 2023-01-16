<?php
/** @var array $category */
/** @var array $rows */

/** @var array $mainRows */
$firstCarouselPage = $mainRows[0];
$secondCarouselPage = $mainRows[2];
$thirdCarouselPage = $mainRows[3];

use models\User;

?>
<h1 style="color: white">Найновіше:</h1>

<body>

<style>
    body {
        background-image: url('../../themes/light/images/MAIN.gif');
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <a style="color: black" href="/news/view/<?= $firstCarouselPage['id'] ?>">
        <div class="carousel-item active">
            <img height="700" src="<?= $firstCarouselPage['Photo_link']?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5><?= $firstCarouselPage['News_name']?></h5>
                <p><?= $firstCarouselPage['short_discription']?></p>
            </div>
            </a>
        </div>
    <a style="color: black" href="/news/view/<?= $secondCarouselPage['id'] ?>">
        <div class="carousel-item">
            <img height="700" src="<?= $secondCarouselPage['Photo_link']?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5><?= $secondCarouselPage['News_name']?></h5>
                <p><?= $secondCarouselPage['short_discription']?></p>
            </div>
    </a>
        </div>
        <a style="color: black" href="/news/view/<?= $thirdCarouselPage['id'] ?>">
        <div class="carousel-item">
            <img height="700" src="<?= $thirdCarouselPage['Photo_link']?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5><?= $thirdCarouselPage['News_name']?></h5>
                <p><?= $thirdCarouselPage['short_discription']?></p>
            </div>
        </a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<hr>
<h1 style="color: white">Жанри які можуть вас зацікавити:</h1>
<div class="album py-5 ">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($category as $categ): ?>
            <?php if (User::isAdmin()): ?>
            <div class="col">
                <div class="card shadow-sm">


                    <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                         src="<?= $categ['Genre_photolink'] ?>" width="100" height="100" alt="kkk">


                    <div class="card-body">
                        <p class="card-text text-center" style="font-size: 30px"><b><?= $categ['Genre_name'] ?></b></p>
                        <hr>
                        <p class="card-text"><?= $categ['Genre_discription'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/Category/view/<?= $categ['id'] ?>" type="button"
                                   class="btn btn-sm btn-outline-secondary">Дивитись</a>

                                <a href="/Category/edit/<?= $categ['id'] ?>" class="btn btn-sm btn-outline-secondary">Редагувати</a>
                                <a href="/Category/delete/<?= $categ['id'] ?>" type="button"
                                   class="btn btn-sm blackButtons controllBtns btn-outline-secondary">Видалити</a>

                            </div>

                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col">
                        <a style="color: black" href="/Category/view/<?= $categ['id'] ?>">
                            <div class="myCards card shadow-sm ">


                                <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     src="<?= $categ['Genre_photolink'] ?>" width="100" height="100" alt="kkk">


                                <div class="card-body">
                                    <p class="card-text text-center" style="font-size: 30px">
                                        <b><?= $categ['Genre_name'] ?></b></p>
                                    <hr>
                                    <p class="card-text"><?= $categ['Genre_discription'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">


                                        </div>

                                    </div>
                                </div>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    <hr style="background-color: white">

    <h1 style="color: white">Інші новини:</h1>
    <div class="row">
        <?php foreach ($rows as $row): ?>
            <?php
            $tmpdate = explode('-', $row['date']);
            $date = "{$tmpdate[2]}.{$tmpdate[1]}.{$tmpdate[0]}";
            ?>
            <div class="col-3">
                <div class="categCards myCards" style="width: 5rem" data-date="<?= $date ?>">
                    <div class="card" style="width: 18rem;">
                        <a style="color: black" href="/news/view/<?= $row['id'] ?>">
                            <img src="<?= $row['Photo_link'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><B><?= $row['News_name'] ?></B></p>
                                <p style="font-size: 20px"><?= $row['Author_name'] ?> </p>
                                <p style="font-size: 14px"><?= $date ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>