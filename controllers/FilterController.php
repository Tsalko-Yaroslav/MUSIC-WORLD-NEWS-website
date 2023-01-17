<?php

namespace controllers;

use models\News;

class FilterController extends \core\Controller
{
    public function indexAction()
    {

        if($_POST['filter']=='desc')
            $news=News::getSortedNewsASC();
        else
            $news=News::GetNews();
        return $this->Render(null,[
            'news'=>$news
        ]);

    }
}