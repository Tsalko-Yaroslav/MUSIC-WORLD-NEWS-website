<?php
core\Core::getInstance()->pageParams['title'] = 'Видалення категорії';
/** @var array $category*/

?>
<div class="alert alert-success" role="alert" style="background-color: white; border-color: black;border-width: 3px; color: black ">
    <h4 class="alert-heading" ><b>Видалення категорії!</b></h4>
    <p>Увага! Ви знаходитесь на сторінці видалення категорії! Після видалення даної категорії всі товари які знаходились в ній перенесуться в стандартну категорію: <br><b>"Не визначено"</b></p>
    <hr>
    <p class="mb-0">Ви впевнені що хочете виконати дію?</p>
    <div class="btn-group">
        <a href="/Category/" class="btn btn-sm btn-outline-secondary greenButtons ">Відміна</a>
        <a href="/Category/delete/<?=$category['id']?>/yes" type="button" class="btn btn-sm  redButtons controllBtns btn-outline-secondary">Видалити</a>

    </div>
</div>
