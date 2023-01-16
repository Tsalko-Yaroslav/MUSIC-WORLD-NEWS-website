<?php

core\Core::getInstance()->pageParams['title'] ='Стати журналістом!'
?>
<div id="addNewsContainer">
    <main>
        <form method="post" action="" enctype="multipart/form-data">
            <p style="text-align: center"><img src="../../themes/light/images/guitarBlack.png" width="100" height="100"
                                               alt="kkk"></p>
            <h1 class="h3 mb-3 fw-normal text-center"><b>Стати журналістом</b></h1>
            <p class="h3 mb-3 fw-normal ">Якщо ви хочете стати журналістом, будь ласка заповніть поля нижче і натисніть кпнопку "Опрацювати". Після відправки ваше звернення буде передано адміністріції для подальшого перегляду.</p>


            <hr>
            <div class="form-floating">

            </div>
            <h4 class="h3 mb-3 fw-normal "><b>Чому ви бажаєте стати журналістом?:</b></h4>
            <div class="form-floating">
                <textarea class="ckeditor" name="request_text" id="request_text"
                          style="width: 1295px; height: 300px"></textarea>

            </div>


<div style="height: 200px; width: 200px; margin: auto; ">
    <button class=" w-100 btn blackButtons btn-primary " type="submit">Опрацювати</button>
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
