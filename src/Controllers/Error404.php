<?php
namespace Controllers;

class Error404 extends Controller
{
    public function index()
    {
        $title = 'Error 404';
        $articles = [
            "article1" => 'Page not found',
        ];

        $this->render(
            [
                'title' => $title,
                'articles' => $articles
            ],
            '404.php'
        );
    }
}
