<?php
core\Core::getInstance()->pageParams['title'] = 'Редагування категорії';
    /** @var array $category*/
    /** @var array $model */

    /** @var array $erros */

?>
<main >
    <form method="post" action="" enctype="multipart/form-data">

        <p style="text-align: center"><img src="../../themes/light/images/guitarBlack.png" width="100" height="100" alt="kkk"></p>
        <h1  class="h3 mb-3 fw-normal text-center"><b>Редагування категорії(Жанру)</b></h1>
        <!--<img class="bd-placeholder-img card-img-top" width="100%" height="100%" style="border-color: black"  src="<?= $category['Genre_photolink']?>"  alt="kkk">-->
        <p class="text-center"><img src="<?= $category['Genre_photolink']?>" class="img-fluid" alt="..."></p>
        <div class="input-group">

            <input name="Genre_photolink" type="file" class="form-control" id="Genre_photolink" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/jpeg " >
            <button class="btn btn-outline-secondary" type="button" id="Genre_photolink">Завантажити</button>
        </div>

        <hr>
        <div class="form-floating">

            <input type="text" class="form-control w-100"  name="Genre_name" id="Genre_name" value="<?=$category['Genre_name'] ?> " placeholder="name@example.com">
            <label for="Genre_name">Назва жанру</label>
            <?php if (!empty($errors['Genre_name'])): ?>
                <span class="error"> <?= $errors['Genre_name']; ?></span>
            <?php endif; ?>

        </div>
        <hr>

        <div class="form-floating w-100">
            <textarea name="Genre_discription" id="Genre_discription"  style="width: 1295px; height: 300px"><?=$category['Genre_discription'] ?> </textarea>

        </div>



        <div style="height: 200px; width: 200px; margin: auto; ">
            <button class=" w-100 btn blackButtons btn-primary " type="submit">Зберегти</button>
        </div>
        <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
    </form>
</main>
