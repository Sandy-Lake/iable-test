<?php

namespace Controllers;

use \Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $title = 'Courses page';

        $courses = Course::all();

        $this->render(
            [
                'title' => $title,
                'courses' => $courses
            ],
            '/courses/index.php'
        );
    }

    public function show(int $id)
    {
        $title = 'Show one course';

        $course = Course::find($id);

        $this->render(
            [
                'title' => $title,
                'courses' => $course
            ],
            '/courses/index.php'
        );
    }

    public function create()
    {
        $title = 'Create new course';

        $this->render(
            [
                'title' => $title
            ],
            '/courses/create.php'
        );
    }

    public function store()
    {
        $data = $_POST;
        $credits = "[";
        if (isset($data['credits']) && count($data['credits']) > 0) {
            foreach($data['credits'] as $key => $credit) {
                $credits .= "\"".$key."=".$credit;
                if ($key !== array_key_last($data['credits'])) {
                    $credits .= "\",";
                } else {
                    $credits .= "\"";
                }
            }
            $credits .= "]";
            $data['credits'] = $credits;
        }

        $result = Course::create($data);

        if ($result) {
            $router = \Registry::getInstance()->getRouter();
            $router->call('courses', 'index');
        } else {
            throw new \ErrorException("Something went wrong");
        }
    }

    public function edit(...$params)
    {
        $id = $params[0];
        $title = 'Update course';
        $course = Course::find($id);
//        $credits = [];
//        $rawCredits = explode(',', trim($course[0]->credits, '[]'));
//        foreach ($rawCredits as $key => $credit) {
//            $fullValue = explode('=', $credit);
//            $credits[str_replace(['"',"'"], "", $fullValue[0])] = str_replace(['"',"'"], "", $fullValue[1]);
//        }
//        var_dump($credits);
        $this->render(
            [
                'title' => $title,
                'course' => $course
            ],
            '/courses/update.php'
        );
    }

    public function update()
    {
        $data = $_POST;

        $result = Course::update($data);

        if ($result) {
            $router = \Registry::getInstance()->getRouter();
            $router->call('courses', 'index');
        } else {
            throw new \ErrorException("Something went wrong");
        }
    }

    public function delete(...$params)
    {
        $id = $params[0];
        $title = 'Delete course';
        $course = Course::find($id);
        $this->render(
            [
                'title' => $title,
                'course' => $course
            ],
            '/courses/delete.php'
        );
    }

    public function destroy()
    {
        $data = $_POST['courseId'];

        $result = Course::delete($data);

        if ($result) {
            $router = \Registry::getInstance()->getRouter();
            $router->call('courses', 'index');
        } else {
            throw new \ErrorException("Something went wrong");
        }
    }
}