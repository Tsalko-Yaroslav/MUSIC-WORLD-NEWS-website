<?php

namespace controllers;

use core\Controller;
use models\News;

class SearchController extends Controller
{
    public function indexAction()
    {
        $news = News::getSearchNews($_GET['search']);

        return $this->render(null, [
            'news' => $news,
            'searchTxt' => $_GET['search']
        ]);
    }
}