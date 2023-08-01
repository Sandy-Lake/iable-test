<?php
namespace Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $title = 'Index page!';
        $articles = [
            "article1" => 'Lorem ipsum dolor sit amet',
            "article2" => 'consectetur adipiscing elit',
            "article3" => '<a href="/courses">Courses</a>'
        ];

        $this->render(
            [
                'title' => $title,
                'articles' => $articles
            ],
            'index.php'
        );
    }
}