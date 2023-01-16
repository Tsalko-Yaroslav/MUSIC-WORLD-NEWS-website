<?php
core\Core::getInstance()->pageParams['title'] = 'Видалення новини';
/** @var array $news*/

?>
<div class="alert alert-success" role="alert" style="background-color: white; border-color: black;border-width: 3px; color: black ">
    <h4 class="alert-heading" ><b>Видалення новини!</b></h4>
    <p>Увага! Ви знаходитесь на сторінці видалення Новини!
    <hr>
    <p class="mb-0">Ви впевнені що хочете виконати дію?</p>
    <div class="btn-group">
        <a href="/news/" class="btn btn-sm btn-outline-secondary greenButtons ">Відміна</a>
        <a href="/news/delete/<?=$news['id']?>/yes" type="button" class="btn btn-sm  redButtons controllBtns btn-outline-secondary">Видалити</a>

    </div>
</div>
