<?php
core\Core::getInstance()->pageParams['title'] = 'Створення новини';
/** @var array $model */
/** @var array $categories */
/** @var array $erros */
?>
<div id="addNewsContainer">
    <main>
        <form method="post" action="" enctype="multipart/form-data">
            <p style="text-align: center"><img src="../../themes/light/images/guitarBlack.png" width="100" height="100"
                                               alt="kkk"></p>
            <h1 class="h3 mb-3 fw-normal text-center"><b>Створення новини</b></h1>
            <h4 class="h3 mb-3 fw-normal "><b>Додайте фото на обкладинку</b></h4>
            <div class="input-group">

                <input name="Photo_link" type="file" class="form-control" id="Photo_link"
                       aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="image/jpeg">

            </div>

            <hr>
            <div class="form-floating">

                <input type="text" class="form-control w-100" name="News_name" id="News_name"
                       placeholder="name@example.com">
                <label for="News_name">Назва новини(Обов'язково)</label>
                <?php if (!empty($errors['News_name'])): ?>
                    <span class="error"> <?= $errors['News_name']; ?></span>
                <?php endif; ?>

            </div>
            <h4 class="h3 mb-3 fw-normal "><b>Додайте короткий опис(Обов'язково)</b></h4>
            <div class="form-floating">
                <textarea class="ckeditor" name="short_discription" id="short_discription"
                          style="width: 1295px; height: 300px"></textarea>
                <?php if (!empty($errors['short_discription'])): ?>
                    <span class="error"> <?= $errors['short_discription']; ?></span>
                <?php endif; ?>
            </div>
            <hr>
            <h4 class="h3 mb-3 fw-normal "><b>Оберіть категорію до якої відносится новина!(Обов'язково)</b></h4>
            <select class="form-control" id="Genre ID" name="Genre ID">
                <?php foreach ($categories as $category): ?>
                    <option  value="<?= $category['id'] ?>"> <?= $category['Genre_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['Genre_ID'])): ?>
                <span class="error"> <?= $errors['Genre_ID']; ?></span>
            <?php endif; ?>
            <hr>
            <h1 class="h3 mb-3 fw-normal text-center"><b>Додайте контент новини</b></h1>


            <div class="form-floating w-100">
                <textarea class="ckeditor" name="News_text_content" id="News_text_content"
                          style="width: 1295px; height: 300px"></textarea>
            </div>
            <hr>


            </div>



            <div style="height: 200px; width: 200px; margin: auto; ">
                <button class=" w-100 btn blackButtons btn-primary " type="submit">Створити</button>
            </div>
            <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
        </form>
    </main>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
    let editors = document.querySelectorAll('.ckeditor');
    for (let editor of editors) {
        ClassicEditor
            .create(editor)


            .catch(error => {
            console.error(error);
        });
    }
</script>
